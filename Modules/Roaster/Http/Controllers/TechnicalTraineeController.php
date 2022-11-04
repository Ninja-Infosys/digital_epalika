<?php

namespace Modules\Roaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Roaster\Entities\TechnicalTrainee;

class TechnicalTraineeController extends Controller
{
    public function index()
    {
        return view('roaster::index');
    }

    public function create()
    {
        return view('roaster::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(TechnicalTrainee $technicalTrainee)
    {


        $technicalTrainee->load('province', 'district', 'localBody', 'documents', 'department', 'designation');

        return view('roaster::admin.training.technicalTrainee.show', compact('technicalTrainee'));
    }

    public function edit(TechnicalTrainee $technicalTrainee)
    {


        $technicalTrainee->load('trainingTrainee');
        return view('roaster::admin.training.technicalTrainee.edit', compact('technicalTrainee'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


    public function updateSelectTechnicalTrainee(TechnicalTrainee $technicalTrainee)
    {
        $technicalTrainee->update([
            'select' => !$technicalTrainee->select
        ]);
        toast('Technical Trainee updated successfully', 'success');
        return back();
    }
}
