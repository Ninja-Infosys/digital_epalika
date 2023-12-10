<?php

namespace Modules\Roaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Roaster\Entities\Trainer;
use Modules\Roaster\Entities\Training;

class OrganizationTrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::withCount('trainingTrainees')->latest()->get();
        $trainers = Trainer::selectRaw('id,name')->latest()->get();
        return view('roaster::traineeUser.training.index', compact('trainings', 'trainers'));
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
