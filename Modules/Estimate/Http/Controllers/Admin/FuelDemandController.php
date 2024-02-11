<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Estimate\Entities\Equipment;
use Modules\Estimate\Entities\Fuel;
use Modules\Estimate\Entities\FuelDemand;
use Modules\Estimate\Http\Requests\FuelDemand\StoreFuelDemandRequest;
use Modules\Estimate\Http\Requests\FuelDemand\UpdateFuelDemandRequest;

class FuelDemandController extends Controller
{
    public function index()
    {
        $fuelDemands =  FuelDemand::with('fuel', 'equipment')->get();
        return view('plan::admin.estimateSetting.fuelDemand.index', compact('fuelDemands'));
    }

    public function create()
    {
        $fuels = Fuel::all();
        $equipments = Equipment::all();
        return view('plan::admin.estimateSetting.fuelDemand.create', compact('fuels', 'equipments'));
    }

    public function store(StoreFuelDemandRequest $request)
    {
        FuelDemand::create($request->validated());
        toast('Fuel Demand Added successfully', 'success');
        return back();
    }

    public function show(FuelDemand $fuelDemand)
    {
        return view('plan::show');
    }

    public function edit(FuelDemand $fuelDemand)
    {
        $fuels = Fuel::all();
        $equipments = Equipment::all();
        return view('plan::admin.estimateSetting.fuelDemand.edit', compact('fuels', 'equipments', 'fuelDemand'));
    }

    public function update(UpdateFuelDemandRequest $request, FuelDemand $fuelDemand)
    {
        $fuelDemand->update($request->validated());
        toast('Fuel Demand Updated successfully', 'success');
        return back();
    }

    public function destroy(FuelDemand $fuelDemand)
    {
        $fuelDemand->delete();
        toast('Fuel Demand deleted successfully', 'success');
        return back();
    }
}
