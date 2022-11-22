<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Requests\PlanLevel\StorePlanLevelRequest;
use App\Http\Requests\PlanLevel\UpdatePlanLevelRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Plan\Entities\PlanLevel;

class PlanLevelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('planLevel_access'),
            403,
            'you are not able to access this resource'
        );
        $planLevels = PlanLevel::with('planLevels')->whereNull('plan_level_id')->get();
        return view('plan::admin.setting.plan_level.index', compact('planLevels'));
    }

    public function create()
    {
        abort_if(Gate::denies('planLevel_create'),
            403,
            'you are not able to access this resource'
        );
        $mainPlanLevels=PlanLevel::whereNull('plan_level_id')->get();

        return view('plan::admin.setting.plan_level.create',compact('mainPlanLevels'));
    }

    public function store(StorePlanLevelRequest $request)
    {
        abort_if(Gate::denies('planLevel_create'),
            403,
            'you are not able to access this resource'
        );
        PlanLevel::create($request->validated());

        toast('Plan Level Added Successfully', 'success');
        return back();
    }

    public function edit(PlanLevel $planLevel)
    {
        abort_if(Gate::denies('planLevel_edit'),
            403,
            'you are not able to access this resource'
        );
        $mainLevels=PlanLevel::whereNull('plan_level_id')->get();
        return view('plan::admin.setting.plan_level.edit', compact('planLevel', 'mainLevels'));
    }

    public function update(UpdatePlanLevelRequest $request, PlanLevel $planLevel)
    {
        abort_if(Gate::denies('planLevel_edit'),
            403,
            'you are not able to access this resource'
        );
        $planLevel->update($request->validated());

        toast('Plan Level Updated Successfully', 'success');
        return redirect(route('admin.plan.planLevel.index'));
    }

    public function destroy(PlanLevel $planLevel)
    {
        abort_if(Gate::denies('planLevel_delete'),
            403,
            'you are not able to access this resource'
        );
        $planLevel->planLevels()->delete();
        $planLevel->delete();

        toast('Plan Level Deleted Successfully', 'success');
        return back();
    }
}
