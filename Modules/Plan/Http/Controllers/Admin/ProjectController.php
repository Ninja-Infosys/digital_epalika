<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Plan\Entities\BudgetHead;
use Modules\Plan\Entities\BudgetSource;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\PlanLevel;
use Modules\Plan\Entities\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('project_access');

        $projects = Project::latest()->get();

        return view('plan::admin.project.index', compact('projects'));
    }

    public function create()
    {
        $this->checkAuthorization('project_create');

        $planAreas = PlanArea::with('planAreas')->whereNull('plan_area_id')->get();
        $planLevels = PlanLevel::with('planLevels')->whereNull('plan_level_id')->get();
        $budgetSources = BudgetSource::all();
        $budgetHeads = BudgetHead::with('budgetHeads')->whereNull('budget_head_id')->get();

        return view('plan::admin.project.create', compact('planAreas', 'planLevels', 'budgetSources', 'budgetHeads'));
    }

    public function store(StoreProjectRequest $request)
    {
        $this->checkAuthorization('project_create');

        Project::create($request->validated() + [
                'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id
            ]);

        toast('योजना/कार्यक्रम सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show(Project $project)
    {
        return view('plan::admin.project.show',compact('project'));
    }

    public function edit($id)
    {
        return view('plan::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
