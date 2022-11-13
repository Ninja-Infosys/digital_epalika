<?php

namespace Modules\Roaster\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Roaster\Entities\Trainer;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TrainerController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('training_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $trainers = Trainer::with('department', 'designation')->latest()->get();

        return view('roaster::admin.trainer.index', compact('trainers'));
    }

    public function create()
    {
        return view('roaster::create');
    }

    public function show(Trainer $trainer)
    {
        abort_if(
            Gate::denies('trainer_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $trainer->load(
            'designation',
            'department',
            'province',
            'localBody',
            'district',
            'subjects',
            'trainerDocuments',
            'trainerExperienceInTrainings',
            'trainerExperienceAsTrainees',
            'trainerExperiences.designation',
            'trainerQualifications',
            'trainerBankDetails'
        );

        return view('roaster::admin.trainer.show', compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        abort_if(
            Gate::denies('trainer_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $trainer->load(
            'trainerDocuments',
            'trainerExperienceInTrainings',
            'trainerExperienceAsTrainees',
            'trainerExperiences.designation',
            'trainerQualifications',
            'trainerBankDetails'
        );

        return view('roaster::admin.trainer.edit', compact('trainer'));
    }
}
