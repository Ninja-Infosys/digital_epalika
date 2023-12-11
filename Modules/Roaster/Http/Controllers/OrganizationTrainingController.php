<?php

namespace Modules\Roaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Roaster\Entities\TechnicalTrainee;
use Modules\Roaster\Entities\Trainee;
use Modules\Roaster\Entities\Trainer;
use Modules\Roaster\Entities\Training;
use Modules\Roaster\Enums\TrainingTypeEnum;

class OrganizationTrainingController extends Controller
{
    public function index()
    {

        $trainings = Training::withCount('trainingTrainees')->whereNull('closed_at')
            ->get()->filter(function ($data) {
                return $data->form_status_according_to_organization_date === true;
            });
        $trainers = Trainer::selectRaw('id,name')->latest()->get();
        return view('roaster::traineeUser.training.index', compact('trainings', 'trainers'));
    }

    public function traineeList(Training $training)
    {
        if ($training->form_type === TrainingTypeEnum::TECHNICAL_TRAINEE) {
            $trainees = TechnicalTrainee::with('designation', 'department', 'localBody', 'district', 'province')->whereHas('trainingTrainee', function ($query) use ($training) {
                $query->where('training_id', $training->id);
            })->paginate(20);
        }
        if ($training->form_type === TrainingTypeEnum::TRAINEE) {
            $trainees = Trainee::with('designation', 'department', 'ethnicity', 'localBody', 'district', 'province')->whereHas('trainingTrainee', function ($query) use ($training) {
                $query->where('training_id', $training->id);
            })->paginate(20);
        }
        return view('roaster::traineeUser.trainee.index', compact('training', 'trainees'));
    }

    public function updateSelectTrainee(Request $request, Trainee $trainee)
    {
        $trainee->update([
            'select' => $request->input('select'),
        ]);
        toast('Trainee updated successfully', 'success');

        return back();
    }
    public function updateSelectTechnicalTrainee(Request $request, TechnicalTrainee $technicalTrainee)
    {
        $technicalTrainee->update([
            'select' => $request->input('select'),
        ]);
        toast('Trainee updated successfully', 'success');

        return back();
    }


    public function create()
    {
        return view('roaster::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('roaster::show');
    }

    public function edit($id)
    {
        return view('roaster::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
