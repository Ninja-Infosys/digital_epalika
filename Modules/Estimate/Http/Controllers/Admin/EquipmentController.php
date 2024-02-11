<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Estimate\Entities\Equipment;
use Modules\Estimate\Http\Requests\Equipment\StoreEquipmentRequest;
use Modules\Estimate\Http\Requests\Equipment\UpdateEquipmentRequest;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        return view('estimate::admin.estimateSetting.equipment.index', compact('equipments'));
    }

    public function create()
    {
        return view('estimate::admin.estimateSetting.equipment.create');
    }

    public function store(StoreEquipmentRequest $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'activity' => ['required', 'string', 'max:255'],
            'is_used_for_transport' => ['required', 'boolean'],
            'capacity' => ['required'],
            'er' => ['nullable'],
            'gr' => ['nullable'],
            'bt' => ['nullable'],
            'er1' => ['nullable'],
            'gr1' => ['nullable'],
            'bt1' => ['nullable']
        ]);
        $er = $request->input('er') ?? 0;
        $gr = $request->input('gr') ?? 0;
        $bt = $request->input('bt') ?? 0;
        $er1 = $request->input('er1') ?? 0;
        $gr1 = $request->input('gr1') ?? 0;
        $bt1 = $request->input('bt1') ?? 0;
        Equipment::create([
            'title' => $request->input('title'),
            'activity' => $request->input('activity'),
            'is_used_for_transport' => $request->input('is_used_for_transport'),
            'capacity' => $request->input('capacity'),
            'speed_with_out_load' => implode(',', [$er, $gr, $bt]),
            'speed_with_load' => implode(',', [$er1, $gr1, $bt1]),
        ]);

        toast('Equipment Added Successfully', 'success');
        return back();
    }

    public function show(Equipment $equipment)
    {
        return view('estimate::show');
    }
    public function edit(Equipment $equipment)
    {
        $values = explode(',', $equipment->speed_with_out_load);
        $speedWithLoad = explode(',', $equipment->speed_with_load);

        return view('estimate::admin.estimateSetting.equipment.edit', compact('equipment', 'values', 'speedWithLoad'));
    }

    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'activity' => ['required', 'string', 'max:255'],
            'is_used_for_transport' => ['required', 'boolean'],
            'capacity' => ['required'],
            'er' => ['nullable'],
            'gr' => ['nullable'],
            'bt' => ['nullable'],
            'er1' => ['nullable'],
            'gr1' => ['nullable'],
            'bt1' => ['nullable']
        ]);
        $er = $request->input('er') ?? 0;
        $gr = $request->input('gr') ?? 0;
        $bt = $request->input('bt') ?? 0;
        $er1 = $request->input('er1') ?? 0;
        $gr1 = $request->input('gr1') ?? 0;
        $bt1 = $request->input('bt1') ?? 0;
        $equipment->update([
            'title' => $request->input('title'),
            'activity' => $request->input('activity'),
            'is_used_for_transport' => $request->input('is_used_for_transport'),
            'capacity' => $request->input('capacity'),
            'speed_with_out_load' => implode(',', [$er, $gr, $bt]),
            'speed_with_load' => implode(',', [$er1, $gr1, $bt1]),
        ]);

        toast('Equipment Updated Successfully', 'success');
        return back();
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        toast('Equipment Deleted Successfully', 'success');
        return back();
    }
}
