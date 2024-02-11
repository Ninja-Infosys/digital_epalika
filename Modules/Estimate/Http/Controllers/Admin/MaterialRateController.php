<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Modules\Estimate\Entities\Material;
use Modules\Estimate\Entities\MaterialRate;
use Modules\Estimate\Http\Requests\MaterialRate\StoreMaterialRateRequest;
use Modules\Estimate\Http\Requests\MaterialRate\UpdateMaterialRateRequest;

class MaterialRateController extends Controller
{
    public function index()
    {
        $materialRates = MaterialRate::with(
            'material',
            'fiscalYear'
        )->get();
        return view('estimate::admin.estimateSetting.materialRate.index', compact('materialRates'));
    }

    public function create()
    {
        $materials = Material::all();
        $fiscalYears = FiscalYear::all();
        return view('estimate::admin.estimateSetting.materialRate.create', compact('materials', 'fiscalYears'));
    }

    public function store(StoreMaterialRateRequest $request)
    {
        MaterialRate::create($request->validated());
        toast('Material Added Successfully', 'success');
        return back();
    }

    public function show($id)
    {
        return view('estimate::show');
    }

    public function edit(MaterialRate $materialRate)
    {
        $materials = Material::all();
        $fiscalYears = FiscalYear::all();
        return view('estimate::admin.estimateSetting.materialRate.edit', compact('materialRate', 'materials', 'fiscalYears'));
    }

    public function update(UpdateMaterialRateRequest $request, MaterialRate $materialRate)
    {
        $materialRate->update($request->validated());
        toast('Material Updated Successfully', 'success');
        return back();
    }

    public function destroy(MaterialRate $materialRate)
    {
        $materialRate->delete();
        toast('Material Deleted Successfully', 'success');
        return back();
    }
}
