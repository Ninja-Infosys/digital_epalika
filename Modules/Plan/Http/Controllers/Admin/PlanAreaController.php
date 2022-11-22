<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Http\Requests\PlanArea\StorePlanAreaRequest;
use Modules\Plan\Http\Requests\PlanArea\UpdatePlanAreaRequest;

class PlanAreaController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('planArea_access'),
            403,
            'You are not allowed to access this resource'
        );

        $planAreas=PlanArea::with('planAreas')->whereNull('plan_area_id')->get();

        return view('plan::admin.setting.plan_area.index',compact('planAreas'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('planArea_create'),
            403,
            'You are not allowed to access this resource'
        );

        $mainPlanAreas=PlanArea::whereNull('plan_area_id')->get();

        return view('plan::admin.setting.plan_area.create',compact('mainPlanAreas'));
    }

    public function store(StorePlanAreaRequest $request)
    {
        abort_if(
            Gate::denies('planArea_create'),
            403,
            'You are not allowed to access this resource'
        );

        PlanArea::create($request->validated());

        toast('योजना क्षेत्र सफलतापूर्वक थपियो','success');

        return back();
    }

    public function edit(PlanArea $planArea)
    {
        abort_if(
            Gate::denies('planArea_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $mainPlanAreas=PlanArea::whereNull('plan_area_id')->get();

        return view('plan::admin.setting.plan_area.edit',compact('planArea','mainPlanAreas'));
    }

    public function update(UpdatePlanAreaRequest $request, PlanArea $planArea)
    {
        abort_if(
            Gate::denies('planArea_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $planArea->update($request->validated());

        toast('योजना क्षेत्र सफलतापूर्वक अपडेट गरियो','success');
        return redirect(route('admin.plan.planArea.index'));
    }

    public function destroy(PlanArea $planArea)
    {
        abort_if(
            Gate::denies('planArea_delete'),
            403,
            'You are not allowed to access this resource'
        );

        $planArea->planAreas()->delete();
        $planArea->delete();

        toast('योजना क्षेत्र सफलतापूर्वक मेटाइयो','success');

        return back();
    }
}
