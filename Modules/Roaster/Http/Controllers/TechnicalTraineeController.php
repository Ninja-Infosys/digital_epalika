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


    public function updateSelectTechnicalTrainee(TechnicalTrainee $technicalTrainee)
    {
        $technicalTrainee->update([
            'select' => !$technicalTrainee->select
        ]);
        toast('Technical Trainee updated successfully', 'success');
        return back();
    }
}
