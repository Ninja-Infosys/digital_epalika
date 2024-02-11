<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\Units\Unit;
use Modules\Equipment\Http\Requests\EquipmentAdditionalCost\StoreEquipmentAdditionalCostRequest;
use Modules\Estimate\Entities\Equipment;
use Modules\Estimate\Entities\EquipmentAdditionalCost;
use Modules\Estimate\Http\Requests\EquipmentAdditionalCost\UpdateEquipmentAdditionalCostRequest;

class EquipmentAdditionalCostController extends Controller
{
    public function index()
    {
        $equipments = Equipment::get();
        return view('estimate::admin.estimateSetting.equipmentAdditionalCost.index', compact('equipments'));
    }

    public function create()
    {
        $fiscalYears = FiscalYear::all();
        $units = Unit::all();
        $equipments = Equipment::all();
        return view('estimate::admin.estimateSetting.equipmentAdditionalCost.create', compact('fiscalYears', 'units', 'equipments'));
    }

    public function store(StoreEquipmentAdditionalCostRequest $request)
    {
        EquipmentAdditionalCost::create($request->validated());
        toast('Equipment Additional Cost Added Successfully', 'success');
        return back();
    }

    public function show(EquipmentAdditionalCost $equipmentAdditionalCost)
    {
        return view('estimate::show');
    }

    public function edit(Equipment $equipment)
    {
        $equipment->load('equipmentAdditionalCosts', 'fuelDemands', 'crewRates');
        return view('estimate::admin.estimateSetting.equipmentAdditionalCost.edit', compact('equipment'));
    }

    public function update(UpdateEquipmentAdditionalCostRequest $request, EquipmentAdditionalCost $equipmentAdditionalCost)
    {
        $equipmentAdditionalCost->update($request->validated());
        toast('Equipment Additional Cost Updated Successfully', 'success');
        return back();
    }

    public function destroy(EquipmentAdditionalCost $equipmentAdditionalCost)
    {
        $equipmentAdditionalCost->delete();
        toast('Equipment Additional Cost Deleted Successfully', 'success');
        return back();
    }
}
