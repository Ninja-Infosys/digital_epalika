<?php

namespace Modules\Roaster\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Roaster\Entities\Trainee;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TraineeController extends Controller
{
    public function show(Trainee $trainee)
    {
        abort_if(
            Gate::denies('trainee_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $trainee->load('province', 'district', 'localBody', 'ethnicity');

        return view('roaster::admin.training.trainee.show', compact('trainee'));
    }

    public function edit(Trainee $trainee)
    {
        abort_if(
            Gate::denies('trainee_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $trainee->load('trainingTrainee');

        return view('roaster::admin.training.trainee.edit', compact('trainee'));
    }

    public function updateSelectTrainee(Trainee $trainee)
    {
        abort_if(
            Gate::denies('trainee_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $trainee->update([
            'select' => ! $trainee->select,
        ]);
        toast('Trainee updated successfully', 'success');

        return back();
    }
}
