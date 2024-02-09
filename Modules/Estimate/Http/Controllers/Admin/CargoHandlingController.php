<?php

namespace Modules\Estimate\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use App\Models\Settings\Units\Unit;
use Modules\Estimate\Entities\CargoHandling;
use Modules\Estimate\Entities\Material;

class CargoHandlingController extends Controller
{
    public function index()
    {
        $cargoHandlings =CargoHandling::with('fiscalYear', 'unit', 'material')->get();
        return view('estimate::admin.estimateSetting.cargoHandling.index', compact('cargoHandlings'));
    }

    public function create()
    {
        $fiscalYears = FiscalYear::all();
        $units = Unit::all();
        $materials = Material::all();
        return view('estimate::admin.estimateSetting.cargoHandling.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('plan::show');
    }

    public function edit(CargoHandling $cargoHandling)
    {
        $cargoHandling->load('collectionResources');
        return view('plan::admin.estimateSetting.cargoHandling.edit', compact('cargoHandling'));
    }

    public function update(Request $request, CargoHandling $cargoHandling)
    {
        //
    }

    public function destroy(CargoHandling $cargoHandling)
    {
        $cargoHandling->delete();
        toast('Cargo Handling Deleted Successfully', 'success');
        return back();
    }
}
