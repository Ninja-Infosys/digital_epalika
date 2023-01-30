<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Entities\BudgetHead;
use Modules\Plan\Entities\BudgetSource;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\PlanLevel;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\ProjectStatusEnum;
use Modules\Plan\Transformers\ProjectResource;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $columnData = $this->getColumns();
        $planAreas = PlanArea::whereNull('plan_area_id')->get();
        $planLevels = PlanLevel::whereNull('plan_level_id')->get();
        $budgetHeads = BudgetHead::whereNull('budget_head_id')->get();
        $budgetSources = BudgetSource::all();

        return view('plan::admin.report.index', compact('fiscalYears', 'columnData', 'planAreas', 'planLevels', 'budgetHeads', 'budgetSources'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        if (empty($request->input('columns'))) {
            $request->request->add(
                ['columns' =>
                    [
                        'projects' => ['registration_no', 'project_name', 'project_start_date', 'project_completion_date', 'allocated_amount']
                    ]
                ]
            );
        }

        $projects = Project::with('fiscalYear', 'budgetHead', 'budgetSource', 'planArea', 'planLevel')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get();

        if (!empty($request->input('columns')['project_grant_details'])) {
            $projects->load('projectGrantDetails');
        }

        if (!empty($request->input('columns')['benefited_member_details'])) {
            $projects->load('benefitedMemberDetails');
        }

        return response()->json([
            'data' => ProjectResource::collection($projects)
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new project())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return !array_keys($column, 'printedData');
            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }

    private function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('from_date'))) {
            $q->whereDate('project_start_date', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('project_start_date', '<=', $request->input('to_date'));
        }

        if (!empty($request->input('plan_sub_area_id'))) {
            $q->whereIn('plan_area_id', $request->input('plan_sub_area_id'));
        }

        if (!empty($request->input('plan_sub_level_id'))) {
            $q->whereIn('plan_level_id', $request->input('plan_sub_level_id'));
        }

        if (!empty($request->input('budget_sub_head_id'))) {
            $q->whereIn('budget_head_id', $request->input('budget_sub_head_id'));
        }

        if (!empty($request->input('project_status'))) {
            $q->where('project_status', $request->input('project_status'));
        }
    }

    public function annualProgressReport()
    {
        $fiscalYears = FiscalYear::get();
        $planAreas = PlanArea::whereNull('plan_area_id')->get();
        $planLevels = PlanLevel::whereNull('plan_level_id')->get();
        $budgetHeads = BudgetHead::whereNull('budget_head_id')->get();
        $budgetSources = BudgetSource::all();

        return view('plan::admin.report.annual-progress-report', compact('fiscalYears', 'planAreas', 'planLevels', 'budgetHeads', 'budgetSources'));
    }

    public function getAnnualProgressReport(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'en_from_date' => ['nullable'],
            'to_date' => ['nullable'],
            'en_to_date' => ['nullable'],
            'fiscal_year' => ['nullable', 'array'],
            'fiscal_year.*' => [Rule::exists('fiscal_years', 'id')],
            'ward_no' => ['nullable', 'array'],
            'plan_area_id' => ['nullable', 'array'],
            'plan_area_id.*' => [Rule::exists('plan_areas', 'id')],
            'plan_sub_area_id' => ['nullable', 'array'],
            'plan_sub_area_id.*' => [Rule::exists('plan_areas', 'id')],
            'plan_level_id' => ['nullable', 'array'],
            'plan_level_id.*' => [Rule::exists('plan_levels', 'id')],
            'plan_sub_level_id' => ['nullable', 'array'],
            'plan_sub_level_id.*' => [Rule::exists('plan_levels', 'id')],
            'budget_head_id' => ['nullable', 'array'],
            'budget_head_id.*' => [Rule::exists('budget_heads', 'id')],
            'budget_sub_head_id' => ['nullable', 'array'],
            'budget_sub_head_id.*' => [Rule::exists('budget_heads', 'id')],
            'budget_source_id' => ['nullable', 'array'],
            'budget_source_id.*' => [Rule::exists('budget_sources', 'id')],
            'project_status' => ['nullable', 'array'],
            'project_status.*' => [new Enum(ProjectStatusEnum::class)],
        ]);

        $projects = Project::where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })->get()
            ->filter(function ($project) use ($request) {
                if (!empty($request->input('ward_no'))) {
                    return count(array_intersect($request->input('ward_no'), $project->ward_no)) > 0;
                }
                return true;
            })
            ->map(function ($project, $key) {

                return [
                    'sn' => (int)$key + 1,
                    'project_name' => $project->project_name ?? '',
                    'unit' => $project->physical_progress_unit ?? '',
                    'total_quantity' => 1.00,
                    'total_amount' => $project->total_cost_estimate_amount ?? 0.00,
                    'total_load' => 100.00,
                    'last_year_completed_quantity' => '',
                    'last_year_expense' => '',
                    'last_year_weighted_progress' => '',
                    'this_year_target_size' => $project->total_cost_estimate_amount ?? 0.00,
                    'this_year_progress' => round(($project->progress_spent_amount/$project->total_cost_estimate_amount)*100, 2) ?? 0.00,
                    'this_year_estimate_expense' => $project->progress_spent_amount ?? 0.00,
                    'yearly_quantity' => 1.00,
                    'yearly_load' =>100.00,
                    'yearly_budget' =>  $project->total_cost_estimate_amount ?? 0.00,
                    'first_quantity' => round(($project->first_quarterly_amount/$project->total_cost_estimate_amount),2) ?? 0.00,
                    'first_load' => round(($project->first_quarterly_amount/$project->total_cost_estimate_amount)*100,2) ?? 0.00,
                    'first_budget' => $project->first_quarterly_amount ?? 0.00,
                    'second_quantity' => round(($project->second_quarterly_amount/$project->total_cost_estimate_amount),2) ?? 0.00,
                    'second_load' => round(($project->second_quarterly_amount/$project->total_cost_estimate_amount)*100,2) ?? 0.00,
                    'second_budget' => $project->second_quarterly_amount ?? 0.00,
                    'third_quantity' => round(($project->third_quarterly_amount/$project->total_cost_estimate_amount),2) ?? 0.00,
                    'third_load' => round(($project->third_quarterly_amount/$project->total_cost_estimate_amount)*100,2) ?? 0.00,
                    'third_budget' => $project->third_quarterly_amount ?? 0.00,
                    'remarks' => $project->remarks ?? ''
                ];
            });

        return response()->json([
            'data' => $projects
        ]);
    }
}
