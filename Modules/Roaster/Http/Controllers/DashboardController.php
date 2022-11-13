<?php

namespace Modules\Roaster\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use App\Models\User;
use Modules\Roaster\Entities\Subject;
use Modules\Roaster\Entities\TechnicalTrainee;
use Modules\Roaster\Entities\Trainee;
use Modules\Roaster\Entities\Trainer;
use Modules\Roaster\Entities\Training;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $setting = OfficeSetting::selectRaw('fiscal_year_id')->with('fiscalYear')->first();
        $trainings = Training::query();
        $trainers = Trainer::
            //            where('province_id', 6)->
        query();
        $trainee = Trainee::
            //            where('province_id', 6)->
        query();
        $technicalTrainee = TechnicalTrainee::
            //            where('province_id', 6)->
        query();

        $userCount = User::count();
        $trainerCount = $trainers->count();
        $technicalTraineeCount = $technicalTrainee->count();

        $trainingCount = $trainings->count();

        $trainingQueryInFy = $trainings->where('fiscal_year_id', $setting->fiscal_year_id);

        $trainingCountInFy = $trainingQueryInFy->count();

        $trainingInFy = $trainingQueryInFy
            ->with('trainingTrainees', 'trainingTrainees.model')
            ->get()
            ->map(function ($training) {
                $model = $training->trainingTrainees->pluck('model');

                return [
                    'training_name' => $training->name,
                    'trainee_count' => $training->trainingTrainees->count() ?? 0,
                    'selected_trainee' => $model->where('select', 1)->count() ?? 0,
                    'unselected_trainee' => $model->where('select', 0)->count() ?? 0,
                ];
            });

        $trainerAccordingToDistricts = $trainers->with('district')->selectRaw('province_id,district_id')
            ->get()
            ->groupBy('district.district')
            ->map(function ($trainer, $key) {
                return [
                    'district' => $key,
                    'count' => count($trainer),
                ];
            });
        $trainerAccordingToSubject = Subject::withCount('trainers')->selectRaw('id, title')->get();

        $traineeCount = $trainee->count();

        $traineeAccordingToDistricts = $trainee->with('district')->selectRaw('province_id,district_id')
            ->get()
            ->groupBy('district.district')
            ->map(function ($trainee, $key) {
                return [
                    'district' => $key,
                    'count' => count($trainee),
                ];
            });

        $technicalTraineeAccordingToDistricts = $technicalTrainee->with('district')->selectRaw('province_id,district_id')
            ->get()
            ->groupBy('district.district')
            ->map(function ($technicalTrainee, $key) {
                return [
                    'district' => $key,
                    'count' => count($technicalTrainee),
                ];
            });

        return view('roaster::admin.dashboard', compact(['trainingInFy', 'setting', 'userCount', 'trainerCount', 'technicalTraineeCount', 'traineeCount', 'trainingCount', 'trainingCountInFy', 'trainerAccordingToDistricts', 'traineeAccordingToDistricts', 'technicalTraineeAccordingToDistricts', 'trainerAccordingToSubject']));
    }
}
