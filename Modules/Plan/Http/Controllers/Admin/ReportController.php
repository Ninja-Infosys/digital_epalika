<?php

namespace Modules\Plan\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Modules\Plan\Entities\BudgetHead;
use Modules\Plan\Entities\BudgetSource;
use Modules\Plan\Entities\PlanArea;
use Modules\Plan\Entities\PlanLevel;
use Modules\Plan\Entities\Project;

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
            'date.from_date' => ['nullable', 'before_or_equal:date.to_date'],
            'date.to_date' => ['nullable', 'after_or_equal:date.from_date'],
            'columns' => ['nullable', 'array']
        ]);

        $projects = Project::with('budgetHead','budgetSource','planArea')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->get();

        return response()->json([
            'view' => (string)View::make('plan::admin.report.report_table', compact('projects'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new Project())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'Project')
                    || array_keys($column, 'projectCostDetail')
                    || array_keys($column, 'projectMaintenanceArrangement')
                    || array_keys($column, 'consumerCommittee');
            })
            ->each(function ($column) use ($columnData) {
                $columnData->push(collect($column)->put('columns', $column['columns']));
            });
        return $columnData;
    }

    public function filterDataFromUser($q, Request $request): void
    {
        if (!empty($request->input('fiscal_year'))) {
            $q->whereIn('fiscal_year_id', $request->input('fiscal_year'));
        }

        if (!empty($request->input('date.from'))) {
            $q->whereDate('project_start_date', '>=', $request->input('date.from'));
        }

        if (!empty($request->input('date.to'))) {
            $q->whereDate('project_start_date', '<=', $request->input('date.to'));
        }

        if (!empty($request->input('ward_no'))) {
            $q->whereIn('ward_no', $request->input('ward_no'));
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
}
