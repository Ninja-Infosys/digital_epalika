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
use Modules\Plan\Entities\ProjectAgreementTerm;

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

        toast('योजना/कार्यक्रम सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Project $project)
    {
        $this->checkAuthorization('project_access');

        $project->load('projectCostDetail', 'projectGrantDetails', 'projectAgreementTerm', 'projectDocuments', 'files');

        return view('plan::admin.project.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        $this->checkAuthorization('project_delete');
    }

    public function saveProjectAgreementTerm(Request $request, Project $project)
    {
        $request->validate([
            'data' => ['required']
        ]);

        ProjectAgreementTerm::updateOrCreate(
            ['project_id' => $project->id],
            [
                'data' => $request->input('data')
            ]
        );

        toast('सम्झौता शर्त सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function uploadFilePage(Project $project)
    {
        return view('plan::admin.project.upload_files', compact('project'));
    }

    public function uploadFile(Request $request, Project $project)
    {
        $formData = $request->validate([
            'file_name' => ['nullable'],
            'file' => ['required', 'file']
        ]);

        $project->files()->create([
            'file_name' => $formData['file_name'] ?? pathinfo($formData['file']->getClientOriginalName(), PATHINFO_FILENAME),
            'extension' => $formData['file']->getClientOriginalExtension(),
            'file' => $formData['file']->store('project_files', 'public')
        ]);

        toast('फाइल सफलतापूर्वक अपलोड गरियो', 'success');
        return back();
    }
}
