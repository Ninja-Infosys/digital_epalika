<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Plan\Entities\PlanLevel;
use Modules\Plan\Http\Requests\PlanLevel\StorePlanLevelRequest;
use Modules\Plan\Http\Requests\PlanLevel\UpdatePlanLevelRequest;

class PlanLevelController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('planLevel_access');
        $planLevels = PlanLevel::with('planLevels')->whereNull('plan_level_id')->get();
        return view('plan::admin.setting.plan_level.index', compact('planLevels'));
    }

    public function create()
    {
        $this->checkAuthorization('planLevel_create');
        $mainPlanLevels=PlanLevel::whereNull('plan_level_id')->get();

        return view('plan::admin.setting.plan_level.create',compact('mainPlanLevels'));
    }

    public function store(StorePlanLevelRequest $request)
    {
        $this->checkAuthorization('planLevel_create');
        PlanLevel::create($request->validated());

        toast('योजना स्तर सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(PlanLevel $planLevel)
    {
        $this->checkAuthorization('planLevel_edit');
        $mainLevels=PlanLevel::whereNull('plan_level_id')->get();
        return view('plan::admin.setting.plan_level.edit', compact('planLevel', 'mainLevels'));
    }

    public function update(UpdatePlanLevelRequest $request, PlanLevel $planLevel)
    {
        $this->checkAuthorization('planLevel_edit');
        $planLevel->update($request->validated());

        toast('योजना स्तर सफलतापूर्वक सम्पादन गरियो', 'success');
        return redirect(route('admin.plan.planLevel.index'));
    }

    public function destroy(PlanLevel $planLevel)
    {
        $this->checkAuthorization('planLevel_delete');
        $planLevel->planLevels()->delete();
        $planLevel->delete();

        toast('योजना स्तर सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
