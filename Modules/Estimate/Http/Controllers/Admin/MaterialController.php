<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Units\Unit;
use Modules\Estimate\Entities\Material;
use Modules\Estimate\Entities\MaterialType;
use Modules\Estimate\Http\Requests\Material\StoreMaterialRequest;
use Modules\Estimate\Http\Requests\Material\UpdateMaterialRequest;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('materialType', 'unit')->get();
        return view('estimate::admin.estimateSetting.material.index', compact('materials'));
    }

    public function create()
    {
        $materialTypes = MaterialType::all();
        $units = Unit::all();
        return view('estimate::admin.estimateSetting.material.create', compact('materialTypes', 'units'));
    }

    public function store(StoreMaterialRequest $request)
    {
        Material::create($request->validated());
        toast('Material Added Successfully', 'success');
        return back();
    }

    public function show(Material $material)
    {
        return view('estimate::show');
    }

    public function edit(Material $material)
    {
        $materialTypes = MaterialType::all();
        $units = Unit::all();
        return view('estimate::admin.estimateSetting.material.edit', compact('material', 'materialTypes', 'units'));
    }

    public function update(UpdateMaterialRequest $request, Material $material)
    {
        $material->update($request->validated());
        toast('Material Updated Successfully', 'success');
        return back();
    }

    public function destroy(Material $material)
    {
        $material->delete();
        toast('Material Deleted Successfully', 'success');
        return back();
    }
}
