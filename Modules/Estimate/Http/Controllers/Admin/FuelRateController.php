<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Estimate\Entities\Fuel;
use Modules\Estimate\Entities\FuelRate;
use Modules\Estimate\Http\Requests\FuelRate\StoreFuelRateRequest;
use Modules\Estimate\Http\Requests\FuelRate\UpdateFuelRateRequest;

class FuelRateController extends Controller
{
    public function index()
    {

        $fuelRates = FuelRate::with('fuel')->get();
        return view('estimate::admin.estimateSetting.fuelRate.index', compact('fuelRates'));
    }

    public function create()
    {
        $fuels = Fuel::all();
        return view('estimate::admin.estimateSetting.fuelRate.create', compact('fuels'));
    }

    public function store(StoreFuelRateRequest $request)
    {
        FuelRate::create($request->validated());
        toast('Fuel Added Successfully', 'success');
        return back();
    }

    public function show($id)
    {
        return view('estimate::show');
    }

    public function edit(FuelRate $fuelRate)
    {
        $fuels = Fuel::all();
        return view('estimate::admin.estimateSetting.fuelRate.edit', compact('fuelRate', 'fuels'));
    }

    public function update(UpdateFuelRateRequest $request, FuelRate $fuelRate)
    {
        $fuelRate->update($request->validated());
        toast('Fuel Rate Updated Successfully', 'success');
        return back();
    }

    public function destroy(FuelRate $fuelRate)
    {
        $fuelRate->delete();
        toast('Fuel Rate Deleted Successfully', 'success');
        return back();
    }
}
