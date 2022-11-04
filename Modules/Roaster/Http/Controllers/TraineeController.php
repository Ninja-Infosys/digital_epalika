<?php

namespace Modules\Roaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Roaster\Entities\Trainee;

class TraineeController extends Controller
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

    public function edit(Trainee $trainee)
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

    public function updateSelectTrainee(Trainee $trainee)
    {
        $trainee->update([
            'select' => !$trainee->select
        ]);
        toast('Trainee updated successfully', 'success');
        return back();
    }
}
