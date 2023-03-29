<?php

namespace Modules\Roaster\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\Department;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Roaster\Entities\Subject;
use Modules\Roaster\Entities\TechnicalTrainee;
use Modules\Roaster\Entities\Trainee;
use Modules\Roaster\Entities\Trainer;
use Modules\Roaster\Entities\Training;
use Modules\Roaster\Enums\TrainingTypeEnum;
use function _\internal\parent;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    private Collection $trainers;
    private Collection $trainings;
    private Collection $trainee;
    private Collection $technicalTrainee;

    public function __construct()
    {
        parent::__construct();

        $this->trainers = Trainer::all();
        $this->trainings = Training::with('trainingTrainees')->get();
        $this->trainee = DB::table('trainees')->whereNull('deleted_at')->get();
        $this->technicalTrainee = DB::table('technical_trainees')->whereNull('deleted_at')->get();


    }

    public function __invoke()
    {
        $this->checkAuthorization('roasterDashboard_access');

        if (request()->ajax()) {
            return [
                'trainingAccordingToFiscalYear' => $this->trainingAccordingToFiscalYear(),
                'trainingAccordingToMonth' => $this->trainingAccordingToMonth(),
                'trainerAccordingToSubject' => $this->trainerAccordingToSubject(),
                'trainingAccordingToType' => $this->trainingAccordingToType(),
                'trainerAccordingToDepartment'=>$this->trainerAccordingToDepartment()
            ];
        }
        $trainerCount = $this->trainers->count();
        $trainingCount = $this->trainings->count();
        $traineeCount = $this->trainee->count();
        $technicalTraineeCount = $this->technicalTrainee->count();
        return view('roaster::admin.dashboard', compact(['trainerCount',
            'trainingCount',
            'traineeCount',
            'technicalTraineeCount']));
    }

    public function trainingAccordingToFiscalYear()
    {
        $fiscalYears = FiscalYear::withCount('trainings')
            ->get()
            ->map(function ($fiscalYear) {
                return [
                    'title' => $fiscalYear->title,
                    'trainings_count' => (int)$fiscalYear->trainings_count,
                ];
            });

        return [
            'labels' => $fiscalYears->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYears->pluck('trainings_count')->toArray(),
                    'label' => 'जम्मा नक्सा',
                ]
            ],
        ];
    }
    public function trainingAccordingToMonth()
    {
        $month = [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0];

        foreach ($this->trainings->where('fiscal_year_id', officeSetting()->fiscal_year_id) as $training) {
            $open_date = Carbon::parse($training->open_date);
            $openDate = $this->get_nepali_date($open_date->format('Y'),
                $open_date->format('m'),
                $open_date->format('d'));
            $month[$openDate['m'] - 1] += 1;
        }
        return [
            'labels' => $this->month_name,
            'dataSets' => [
                [
                    'data' => $month,
                    'label' => 'तालिम',
                ]
            ]
        ];
    }

    public function trainerAccordingToSubject()
    {
        return Subject::withCount('trainers')
            ->get()
            ->map(function ($subject) {
                return [
                    'name' => $subject->title,
                    'data' => (int)$subject->trainers_count
                ];
            });
    }
    public function trainingAccordingToType()
    {
        $data = collect();

        foreach (TrainingTypeEnum::cases() as $trainingTypeEnum) {
            $data->push([
                'name' => $trainingTypeEnum->label(),
                'data' => $this->trainings
                    ->where('fiscal_year_id', officeSetting()->fiscal_year_id)
                    ->where('form_type', $trainingTypeEnum)
                    ->count()
            ]);
        }
        return $data;
    }
    public function trainerAccordingToDepartment()
    {
        return Department::withCount('trainers')
            ->get()
            ->map(function ($department) {
                return [
                    'name' => $department->title,
                    'data' => (int)$department->trainers_count
                ];
            });
    }

}
