<?php

namespace Modules\Roaster\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Roaster\Entities\TechnicalTrainee;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TechnicalTraineeController extends Controller
{
    public function show(TechnicalTrainee $technicalTrainee)
    {
        abort_if(
            Gate::denies('technicalTrainee_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $technicalTrainee->load('province', 'district', 'localBody', 'documents', 'department', 'designation');

        return view('roaster::admin.training.technicalTrainee.show', compact('technicalTrainee'));
    }

    public function edit(TechnicalTrainee $technicalTrainee)
    {
        abort_if(
            Gate::denies('technicalTrainee_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $technicalTrainee->load('trainingTrainee');

        return view('roaster::admin.training.technicalTrainee.edit', compact('technicalTrainee'));
    }

    public function updateSelectTechnicalTrainee(TechnicalTrainee $technicalTrainee)
    {
        abort_if(
            Gate::denies('technicalTrainee_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $technicalTrainee->update([
            'select' => ! $technicalTrainee->select,
        ]);
        toast('Technical Trainee updated successfully', 'success');

        return back();
    }
}
