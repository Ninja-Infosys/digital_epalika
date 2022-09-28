<?php

namespace App\Http\Controllers\Admin\Setting\Units;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\MeasurementUnits\StoreUnitConversionRequest;
use App\Http\Requests\Setting\MeasurementUnits\UpdateUnitConversionRequest;
use App\Models\Settings\Units\Unit;
use App\Models\Settings\Units\UnitConversion;
use Illuminate\Support\Facades\Gate;

class InternalUnitConversionController extends Controller
{
    public function index(Unit $unit)
    {
        abort_if(Gate::denies('unit_access'),
            403,
            'You are not allowed to digital board news access'
        );

        $conversionUnits = Unit::where('id', '!=', $unit->id)->where('measurement_unit_id', $unit->measurement_unit_id)->get();
        $conversions = UnitConversion::where('conversion_from', $unit->id)->get();
        return view('admin.setting.units.unit.conversion.internal.index', compact('unit', 'conversionUnits', 'conversions'));
    }

    public function create(Unit $unit)
    {
        //
    }

    public function store(StoreUnitConversionRequest $request, Unit $unit)
    {
        foreach ($request->input('conversion') as $conversion) {
            if ($conversionData = UnitConversion::where('conversion_to', $conversion['conversion_to'])->where('conversion_from', $unit->id)->first()) {
                $conversionData->update(['rate' => $conversion['rate'] ?? '']);
            } else {
                UnitConversion::create($conversion + [
                        'conversion_from' => $unit->id,
                    ]);
            }
        }

        toast('मापन एकाइ रुपान्तरण सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.units.unit.index'));
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
