<?php

namespace App\Http\Controllers\Admin\Setting\Units;

use App\Models\Settings\Units\MeasurementUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeasurementUnitRequest;
use App\Http\Requests\UpdateMeasurementUnitRequest;
use App\Models\Settings\Units\Type;
use Illuminate\Support\Facades\Gate;

class MeasurementUnitController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('MeasurementUnit_access'),
            403,
            'You are not allowed to access this resource'
        );
        $types = Type::whereHas('measurementUnit')->withCount('measurementUnit')->latest()->get();

        return view('admin.setting.units.measurementUnit.index', compact('types'));
    }

    public function create()
    {
        abort_if(Gate::denies('MeasurementUnit_create'),
            403,
            'You are not allowed to this resource'
        );

        $types = Type::latest()->get();
        return view('admin.setting.units.measurementUnit.create', compact(['types']));
    }

    public function store(StoreMeasurementUnitRequest $request)
    {
        abort_if(Gate::denies('MeasurementUnit_create'),
            403,
            'You are not allowed to access this resource'
        );

        MeasurementUnit::create($request->validated());
        toast('मापन एकाइ विविधता सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.units.measurementUnit.index'));
    }

    public function show(MeasurementUnit $measurementUnit)
    {
        //
    }

    public function edit(MeasurementUnit $measurementUnit)
    {
        abort_if(Gate::denies('MeasurementUnit_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $types = Type::latest()->get();
        return view('admin.setting.units.measurementUnit.edit', compact('measurementUnit', 'types'));
    }

    public function update(UpdateMeasurementUnitRequest $request, MeasurementUnit $measurementUnit)
    {
        abort_if(Gate::denies('MeasurementUnit_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $measurementUnit->update($request->validated());

        toast('मापन एकाइ विविधता सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.units.measurementUnit.index'));
    }

    public function destroy(MeasurementUnit $measurementUnit)
    {
        abort_if(Gate::denies('MeasurementUnit_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $measurementUnit->delete();
        toast('मापन एकाइ विविधता सफलतापूर्वक मेटाइयो', 'success');
        return redirect(route('admin.units.measurementUnit.index'));
    }
}
