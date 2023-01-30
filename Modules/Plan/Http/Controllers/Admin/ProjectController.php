<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\Plan\Entities\BudgetHead;
use Modules\Plan\Entities\BudgetSource;
use Modules\Plan\Entities\ExpenseHead;
use Modules\Plan\Entities\GrantCategory;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\PlanLevel;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\PlanTemplateTypeEnum;
use Modules\Plan\Enums\ProjectOperatedThroughEnum;
use Modules\Plan\Http\Requests\Project\StoreProjectRequest;
use Modules\Plan\Http\Requests\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('project_access');

        $projects = Project::with('planArea')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['registration_no', 'project_name'], request('search'));
            }
            if (!empty(request('from_date'))) {
                $q->whereDate('project_start_date', '>=', request('from_date'));
            }
            if (!empty(request('to_date'))) {
                $q->whereDate('project_start_date', '<=', request('to_date'));
            }
            if (!empty(request('project_status'))) {
                $q->where('project_status', request('project_status'));
            }
            if (!empty(request('grant_category_id'))) {
                $q->where('grant_category_id', request('grant_category_id'));
            }
            if (!empty(request('budget_source_id'))) {
                $q->where('budget_source_id', request('budget_source_id'));
            }
            if (!empty(request('expense_head_id'))) {
                $q->where('expense_head_id', request('expense_head_id'));
            }

        })
            ->latest()->paginate(10);
        $budgetSources = BudgetSource::all();
        $grantCategories = GrantCategory::all();
        $expenseHeads = ExpenseHead::all();


        return view('plan::admin.project.index', compact('projects', 'budgetSources', 'grantCategories', 'expenseHeads'));
    }

    public function create()
    {
        $this->checkAuthorization('project_create');

        $planAreas = PlanArea::with('planAreas')->whereNull('plan_area_id')->get();
        $planLevels = PlanLevel::with('planLevels')->whereNull('plan_level_id')->get();
        $budgetSources = BudgetSource::all();
        $budgetHeads = BudgetHead::with('budgetHeads')->whereNull('budget_head_id')->get();
        $grantCategories = GrantCategory::all();
        $expenseHeads = ExpenseHead::all();
        $registration_no = "PP-" . (\officeSetting()->fiscalYear->title ?? '') . '-' . Str::padLeft(Project::max('id') + 1, 3, 0);

        return view('plan::admin.project.create', compact('planAreas', 'planLevels', 'budgetSources', 'budgetHeads', 'grantCategories', 'expenseHeads', 'registration_no'));
    }

    public function store(StoreProjectRequest $request)
    {
        $this->checkAuthorization('project_create');

        Project::create($request->validated() + [
                'fiscal_year_id' => \officeSetting()->fiscal_year_id
            ]);

        toast('योजना/कार्यक्रम सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Project $project)
    {
        $this->checkAuthorization('project_access');

        $project->load('projectBidDetail', 'projectAgreementTerm', 'projectMaintenanceArrangement', 'projectBidSubmissions', 'planArea', 'planLevel', 'consumerCommittee.consumerCommitteeOfficials', 'budgetSource', 'budgetHead', 'projectGrantDetails', 'benefitedMemberDetails', 'projectAgreementTerm', 'projectDocuments', 'files', 'consumerCommitteeTransactions', 'technicalCostEstimates');

        if (request()->ajax()) {
            return response()->json([
                'view' => (string)View::make('plan::admin.project.detail', compact('project'))
            ]);
        }

        return view('plan::admin.project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->checkAuthorization('project_edit');

        $planAreas = PlanArea::with('planAreas')->whereNull('plan_area_id')->get();
        $planLevels = PlanLevel::with('planLevels')->whereNull('plan_level_id')->get();
        $budgetSources = BudgetSource::all();
        $budgetHeads = BudgetHead::with('budgetHeads')->whereNull('budget_head_id')->get();
        $grantCategories = GrantCategory::all();
        $expenseHeads = ExpenseHead::all();

        return view('plan::admin.project.edit', compact('project', 'planAreas', 'planLevels', 'budgetSources', 'budgetHeads', 'grantCategories', 'expenseHeads'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->checkAuthorization('project_edit');

        $project->update($request->validated());

        toast('परियोजना सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.plan.project.index'));
    }

    public function destroy(Project $project)
    {
        $this->checkAuthorization('project_delete');
    }

    public function fileList(Project $project)
    {
        $project->load('files');

        return view('plan::admin.project.file_list', compact('project'));
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

        return redirect(route('admin.plan.project.fileList', $project));
    }

    public function print(Request $request, Project $project, PlanTemplateTypeEnum $planTemplateTypeEnum)
    {
        if ($request->ajax()) {
            return response()->json([
                'data' => $project->getSpecificTemplateData($planTemplateTypeEnum)
            ]);
        }
    }

}
