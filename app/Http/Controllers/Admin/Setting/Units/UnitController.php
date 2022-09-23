<?php

namespace App\Http\Controllers\Admin\Setting\Units;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\MeasurementUnits\StoreUnitRequest;
use App\Http\Requests\Setting\MeasurementUnits\UpdateUnitRequest;
use App\Models\Settings\Units\Unit;
use Illuminate\Support\Facades\Gate;

class UnitController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('unit_access'),
            403,
            'You are not allowed to access this resource'
        );

        $units = Unit::with('measurementUnit', 'measurementUnit.type')->latest()->get();

        return view('admin.setting.units.unit.index', compact('units'));
    }

    public function create()
    {
        abort_if(Gate::denies('unit_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('admin.setting.units.unit.create');
    }

    public function store(StoreUnitRequest $request)
    {
        abort_if(Gate::denies('unit_create'),
            403,
            'You are not allowed to this resource'
        );

        Unit::create($request->validated());
        toast('मापन एकाइ सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.units.unit.index'));
    }

    public function show(Unit $unit)
    {

    }

    public function edit(Unit $unit)
    {
        abort_if(Gate::denies('unit_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $unit->load('measurementUnit');

        return view('admin.setting.units.unit.edit', compact('unit'));
    }

    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        abort_if(Gate::denies('unit_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $unit->update($request->validated());

        toast('मापन एकाइ सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.units.unit.index'));
    }

    public function destroy(Unit $unit)
    {
        abort_if(Gate::denies('unit_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $unit->delete();
        toast('मापन एकाइ सफलतापूर्वक मेटाइयो', 'success');
        return redirect(route('admin.units.unit.index'));
    }
}
