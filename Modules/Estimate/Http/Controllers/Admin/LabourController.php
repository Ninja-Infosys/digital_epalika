<?php

namespace Modules\Estimate\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Units\Unit;
use Modules\Estimate\Entities\Labour;
use Modules\Estimate\Http\Requests\Labour\StoreLabourRequest;
use Modules\Estimate\Http\Requests\Labour\UpdateLabourRequest;

class LabourController extends Controller
{
    public function index()
    {
        $labours = Labour::with('unit')->get();
        return view('estimate::admin.estimateSetting.labour.index', compact('labours'));
    }

    public function create()
    {
        $units = Unit::all();
        return view('estimate::admin.estimateSetting.labour.create', compact('units'));
    }

    public function store(StoreLabourRequest $request)
    {
        Labour::create($request->validated());
        toast('Labour Store Successfully', 'success');
        return back();
    }

    public function show(Labour $labour)
    {
        return view('estimate::show');
    }

    public function edit(Labour $labour)
    {
        $units = Unit::all();
        return view('estimate::admin.estimateSetting.labour.edit', compact('units', 'labour'));
    }

    public function update(UpdateLabourRequest $request, Labour $labour)
    {
        $labour->update($request->validated());
        toast('Labour Updated Successfully', 'success');
        return back();
    }

    public function destroy(Labour $labour)
    {
        $labour->delete();
        toast('Labour Deleted Successfully', 'success');
        return back();
    }
}
