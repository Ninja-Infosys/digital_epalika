<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Estimate\Entities\CrewRate;
use Modules\Estimate\Entities\Equipment;
use Modules\Estimate\Entities\Labour;
use Modules\Estimate\Http\Requests\CrewRate\StoreCrewRateRequest;
use Modules\Estimate\Http\Requests\CrewRate\UpdateCrewRateRequest;

class CrewRateController extends Controller
{
    public function index()
    {
        $crewRates = CrewRate::with(
            'labour',
            'equipment'
        )->get();
        return view('plan::admin.estimateSetting.crewRate.index', compact('crewRates'));
    }

    public function create()
    {
        $labours = Labour::all();
        $equipments = Equipment::all();
        return view('plan::admin.estimateSetting.crewRate.create', compact('labours', 'equipments'));
    }

    public function store(StoreCrewRateRequest $request)
    {
        CrewRate::create($request->validated());
        toast('Crew Rate Added Successfully', 'success');
        return back();
    }

    public function show(CrewRate $crewRate)
    {
        return view('plan::show');
    }

    public function edit(CrewRate $crewRate)
    {
        $labours = Labour::all();
        $equipments = Equipment::all();
        return view('plan::admin.estimateSetting.crewRate.edit', compact('labours', 'equipments', 'crewRate'));
    }

    public function update(UpdateCrewRateRequest $request, CrewRate $crewRate)
    {
        $crewRate->update($request->validated());
        toast('Crew Rate Updated Successfully', 'success');
        return back();
    }

    public function destroy(CrewRate $crewRate)
    {
        $crewRate->delete();
        toast('Crew Rate Deleted Successfully', 'success');
        return back();
    }
}
