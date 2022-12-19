<?php

namespace Modules\Roaster\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Modules\Roaster\Entities\Subject;
use Modules\Roaster\Entities\TechnicalTrainee;
use Modules\Roaster\Entities\Trainee;
use Modules\Roaster\Entities\Trainer;
use Modules\Roaster\Entities\Training;

class DashboardController extends Controller
{
    public function __invoke(): Factory|View|Application
    {
        [$trainingCount, $trainingCountInFy, $trainingInFyData] = $this->getTrainingData();

        [$trainerCount, $trainerAccordingToDistrictsData] = $this->getTrainerData();

        $trainerAccordingToSubjectData = $this->getTrainerAccordingToSubject();
        [$traineeCount, $traineeAccordingToDistrictsData] = $this->getTraineeData();

        [$technicalTraineeCount, $technicalTraineeAccordingToDistrictsData] = $this->getTechnicalTraineeData();

        return view('roaster::admin.dashboard', compact([
            'trainingInFyData',
            'trainerAccordingToDistrictsData',
            'traineeAccordingToDistrictsData',
            'technicalTraineeAccordingToDistrictsData',
            'trainerCount',
            'trainerAccordingToSubjectData',
            'technicalTraineeCount',
            'traineeCount',
            'trainingCount',
            'trainingCountInFy',]));
    }


    private function getTrainingData(): array
    {
        $setting = $this->getSetting();

        $trainings = Training::query();

        $trainingCount = $trainings->count();

        $trainingQueryInFy = $trainings->where('fiscal_year_id', $setting->fiscal_year_id);

        $trainingCountInFy = $trainingQueryInFy->count();

        $trainingInFyData = $this->getTrainingDataAccordingToFiscalYear($trainingQueryInFy);

        return array($trainingCount, $trainingCountInFy, $trainingInFyData);
    }

    /**
     * @return array
     */
    private function getTrainerData(): array
    {
        $trainers = Trainer::query();

        $trainerCount = $trainers->count();

        $trainerAccordingToDistrictsData = $this->getTrainerAccordingToDistricts($trainers);
        return array($trainerCount, $trainerAccordingToDistrictsData);
    }

    /**
     * @return array
     */
    private function getTraineeData(): array
    {
        $trainee = Trainee::query();

        $traineeCount = $trainee->count();

        $traineeAccordingToDistrictsData = $this->getTraineeAccordingToDistricts($trainee);
        return array($traineeCount, $traineeAccordingToDistrictsData);
    }

    /**
     * @return array
     */
    private function getTechnicalTraineeData(): array
    {
        $technicalTrainee = TechnicalTrainee::query();
        $technicalTraineeCount = $technicalTrainee->count();
        $technicalTraineeAccordingToDistrictsData = $this->getTraineeAccordingToDistricts($technicalTrainee);
        return array($technicalTraineeCount, $technicalTraineeAccordingToDistrictsData);
    }

    /**
     * @return mixed
     */
    private function getSetting(): mixed
    {
        return OfficeSetting::selectRaw('fiscal_year_id')->with('fiscalYear')->first();
    }

    /**
     * @param Builder $trainingQueryInFy
     * @return array
     */
    private function getTrainingDataAccordingToFiscalYear(Builder $trainingQueryInFy): array
    {
        $trainingInFy = $trainingQueryInFy
            ->with('trainingTrainees', 'trainingTrainees.model')
            ->get()
            ->map(function ($training) {
                $model = $training->trainingTrainees->pluck('model');

                return [
                    'training_name' => $training->name ?? '',
                    'trainee_count' => $training->trainingTrainees->count() ?? 0,
                    'selected_trainee' => $model->where('select', 1)->count() ?? 0,
                    'unselected_trainee' => $model->where('select', 0)->count() ?? 0,
                ];
            });

        return [
            'labels' => $trainingInFy->pluck('training_name')->toArray(),
            'dataSets' => [
                [
                    'data' => $trainingInFy->pluck('trainee_count')->toArray(),
                    'label' => 'जम्मा प्रशियार्थी',
                    'fill' => 'false',
                ],
                [
                    'data' => $trainingInFy->pluck('selected_trainee')->toArray(),
                    'label' => 'छानिएका प्रशियार्थी',
                    'fill' => 'false',
                ],
                [
                    'data' => $trainingInFy->pluck('unselected_trainee')->toArray(),
                    'label' => 'नछानिएका प्रशियार्थी',
                    'fill' => 'false',
                ]
            ],
        ];
    }

    /**
     * @param Builder $trainers
     * @return array
     */
    private function getTrainerAccordingToDistricts(Builder $trainers): array
    {
        $trainerAccordingToDistricts = $trainers
            ->with('district')
            ->selectRaw('province_id,district_id')
            ->get()
            ->groupBy('district.district')
            ->map(function ($trainer, $key) {
                return [
                    'district' => $key,
                    'count' => count($trainer),
                ];
            });


        return [
            'labels' => $trainerAccordingToDistricts->pluck('district')->toArray(),
            'dataSets' => [
                [
                    'data' => $trainerAccordingToDistricts->pluck('count')->toArray(),
                    'label' => 'प्रशिक्षकहरू',
                    'fill' => 'false',
                ]
            ]
        ];
    }

    /**
     * @param Builder $trainee
     * @return array
     */
    private function getTraineeAccordingToDistricts(Builder $trainee): array
    {
        $traineeAccordingToDistricts = $trainee->with('district')
            ->selectRaw('province_id,district_id')
            ->get()
            ->groupBy('district.district')
            ->map(function ($trainee, $key) {
                return [
                    'district' => $key,
                    'count' => count($trainee),
                ];
            });

        return [
            'labels' => $traineeAccordingToDistricts->pluck('district')->toArray(),
            'dataSets' => [
                [
                    'data' => $traineeAccordingToDistricts->pluck('count')->toArray(),
                    'label' => 'प्रशिक्षकहरू',
                    'fill' => 'false',
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    private function getTrainerAccordingToSubject(): array
    {
        $trainerAccordingToSubject = Subject::withCount('trainers')->selectRaw('id, title')->get();

        return [
            'labels' => $trainerAccordingToSubject->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $trainerAccordingToSubject->pluck('trainers_count')->toArray(),
                    'label' => 'जम्मा प्रशिक्षकहरू',
                    'fill' => 'false',
                ]
            ]
        ];
    }
}
