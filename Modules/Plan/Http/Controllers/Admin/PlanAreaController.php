<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Http\Requests\PlanArea\StorePlanAreaRequest;
use Modules\Plan\Http\Requests\PlanArea\UpdatePlanAreaRequest;

class PlanAreaController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('planArea_access');

        $planAreas = PlanArea::with('planAreas')->whereNull('plan_area_id')->get();

        return view('plan::admin.setting.plan_area.index', compact('planAreas'));
    }

    public function planSubArea(Request $request)
    {
        $this->checkAuthorization('planArea_access');

        $request->validate([
            'plan_area_id' => ['required']
        ]);

        return response()->json([
            'data' => PlanArea::filterData($request->all())->get()
        ]);
    }

    public function create()
    {
        $this->checkAuthorization('planArea_create');

        $mainPlanAreas = PlanArea::whereNull('plan_area_id')->get();

        return view('plan::admin.setting.plan_area.create', compact('mainPlanAreas'));
    }

    public function store(StorePlanAreaRequest $request)
    {
        $this->checkAuthorization('planArea_create');

        PlanArea::create($request->validated());

        toast('योजना क्षेत्र सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function edit(PlanArea $planArea)
    {
        $this->checkAuthorization('planArea_edit');

        $mainPlanAreas = PlanArea::whereNull('plan_area_id')->get();

        return view('plan::admin.setting.plan_area.edit', compact('planArea', 'mainPlanAreas'));
    }

    public function update(UpdatePlanAreaRequest $request, PlanArea $planArea)
    {
        $this->checkAuthorization('planArea_edit');

        $planArea->update($request->validated());

        toast('योजना क्षेत्र सफलतापूर्वक अपडेट गरियो', 'success');
        return redirect(route('admin.plan.planArea.index'));
    }

    public function destroy(PlanArea $planArea)
    {
        $this->checkAuthorization('planArea_delete');

        $planArea->planAreas()->delete();
        $planArea->delete();

        toast('योजना क्षेत्र सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
