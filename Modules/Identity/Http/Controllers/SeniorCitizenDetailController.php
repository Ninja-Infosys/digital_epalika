<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\SeniorCitizenDetail;

class SeniorCitizenDetailController extends Controller
{
    public function index()
    {
        $seniorCitizenDetails = SeniorCitizenDetail::all();
        return view('identity::admin.seniorCitizen.index',compact('seniorCitizenDetails'));
    }

    public function create()
    {

        return view('identity::admin.seniorCitizen.create');
    }

    public function store(Request $request)
    {

    }

    public function show(SeniorCitizenDetail $seniorCitizenDetail)
    {
        $seniorCitizenDetail->load('fingerPrints');
        return view('identity::admin.seniorCitizen.show', compact('seniorCitizenDetail'));
    }

    public function edit(SeniorCitizenDetail $seniorCitizenDetail)
    {
        $seniorCitizenDetail->load('province','district','localBody');

        return view('identity::admin.seniorCitizen.edit', compact('seniorCitizenDetail'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(SeniorCitizenDetail $seniorCitizenDetail)
    {
        $seniorCitizenDetail->delete();
        return back();
    }
}
