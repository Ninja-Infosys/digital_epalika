<?php

namespace App\Http\Controllers\Admin\Setting\Units;

use App\Models\Settings\Units\Unit;
use App\Models\Settings\Units\UnitConversion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitConversionRequest;
use App\Http\Requests\UpdateUnitConversionRequest;
use Illuminate\Support\Facades\Gate;

class UnitConversionController extends Controller
{
    public function index(Unit $unit)
    {
        abort_if(Gate::denies('unit_access'),
            403,
            'You are not allowed to digital board news access'
        );

        $units = Unit::with('conversion_to')->latest()->get();
        return view('admin.setting.units.unit.index', compact('units'));
    }

    public function create(Unit $unit)
    {
        //
    }

    public function store(StoreUnitConversionRequest $request, Unit $unit)
    {
        //
    }

    public function show(Unit $unit, UnitConversion $unitConversion)
    {
        //
    }

    public function edit(Unit $unit, UnitConversion $unitConversion)
    {
        //
    }

    public function update(UpdateUnitConversionRequest $request, Unit $unit, UnitConversion $unitConversion)
    {
        //
    }

    public function destroy(Unit $unit, UnitConversion $unitConversion)
    {
        //
    }
}
