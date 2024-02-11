<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Modules\Estimate\Entities\Labour;
use Modules\Estimate\Entities\LabourRate;
use Modules\Estimate\Http\Requests\LabourRate\StoreLabourRateRequest;
use Modules\Estimate\Http\Requests\LabourRate\UpdateLabourRateRequest;

class LabourRateController extends Controller
{
    public function index()
    {
        $labourRates = LabourRate::with('labour')->get();
        return view('estimate::admin.estimateSetting.labourRate.index', compact('labourRates'));
    }

    public function create()
    {
        $labours = Labour::get();
        $fiscalYears = FiscalYear::all();
        return view('estimate::admin.estimateSetting.labourRate.create', compact('labours', 'fiscalYears'));
    }

    public function store(StoreLabourRateRequest $request)
    {
        LabourRate::create($request->validated());
        toast('Labour Rate Store Successfully', 'success');
        return back();
    }

    public function show(LabourRate $labourRate)
    {
        return view('estimate::show');
    }

    public function edit(LabourRate $labourRate)
    {
        $labours = Labour::get();
        $fiscalYears = FiscalYear::all();
        return view('estimate::admin.estimateSetting.labourRate.edit', compact('labourRate', 'labours', 'fiscalYears'));
    }

    public function update(UpdateLabourRateRequest $request, LabourRate $labourRate)
    {
        $labourRate->update($request->validated());
        toast('Labour Rate Updated Successfully', 'success');
        return back();
    }

    public function destroy(LabourRate $labourRate)
    {
        $labourRate->delete();
        toast('Labour Rate Deleted Successfully', 'success');
        return back();
    }
}
