<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Estimate\Entities\MaterialType;
use Modules\Estimate\Http\Requests\MaterialType\StoreMaterialTypeRequest;
use Modules\Estimate\Http\Requests\MaterialType\UpdateMaterialTypeRequest;

class MaterialTypeController extends Controller
{
    public function index()
    {
        $materialTypes = MaterialType::all();
        return view('estimate::admin.estimateSetting.materialType.index', compact('materialTypes'));
    }

    public function create()
    {
        return view('estimate::admin.estimateSetting.materialType.create');
    }

    public function store(StoreMaterialTypeRequest $request)
    {
        MaterialType::create($request->validated());
        toast('Material Type Added successfully', 'success');
        return back();
    }

    public function show($id)
    {
        return view('estimate::show');
    }

    public function edit(MaterialType $materialType)
    {
        return view('estimate::admin.estimateSetting.materialType.edit', compact('materialType'));
    }

    public function update(UpdateMaterialTypeRequest $request, MaterialType $materialType)
    {
        $materialType->update($request->validated());
        toast('Material Type Updated successfully', 'success');
        return back();
    }

    public function destroy(MaterialType $materialType)
    {
        $materialType->delete();
        toast('Material Type Deleted successfully', 'success');
        return back();
    }
}
