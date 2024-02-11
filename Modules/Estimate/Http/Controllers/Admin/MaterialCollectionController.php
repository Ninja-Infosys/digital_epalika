<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\Units\Unit;
use Modules\Estimate\Entities\MaterialCollection;
use Modules\Estimate\Entities\MaterialRate;
use Modules\Estimate\Http\Requests\MaterialCollection\StoreMaterialCollectionRequest;
use Modules\Estimate\Http\Requests\MaterialCollection\UpdateMaterialCollectionRequest;

class MaterialCollectionController extends Controller
{
    public function index()
    {
        $materialCollections = MaterialCollection::with(
            'materialRate',
            'unit',
            'fiscalYear'
        )->get();
        return view('estimate::admin.estimateSetting.materialCollection.index', compact('materialCollections'));
    }

    public function create()
    {

        $units = Unit::all();
        $materialRates = MaterialRate::all();
        $fiscalYears = FiscalYear::all();
        return view('estimate::admin.estimateSetting.materialCollection.create', compact('units', 'materialRates', 'fiscalYears'));
    }

    public function store(StoreMaterialCollectionRequest $request)
    {
        MaterialCollection::create($request->validated());
        toast('Material Collection Added Successfully', 'success');
        return back();
    }

    public function show($id)
    {
        return view('estimate::show');
    }

    public function edit(MaterialCollection $materialCollection)
    {
        $units = Unit::all();
        $fiscalYears = FiscalYear::all();
        $materialRates = MaterialRate::all();
        $materialCollection->load('collectionResources');
        return view('estimate::admin.estimateSetting.materialCollection.edit', compact('fiscalYears', 'units', 'materialRates', 'materialCollection'));
    }

    public function update(UpdateMaterialCollectionRequest $request, MaterialCollection $materialCollection)
    {
        $materialCollection->update($request->validated());
        toast('Material Collection Updated Successfully', 'success');
        return back();
    }

    public function destroy(MaterialCollection $materialCollection)
    {
        $materialCollection->delete();
        toast('Material Collection Deleted Successfully', 'success');
        return back();
    }
}
