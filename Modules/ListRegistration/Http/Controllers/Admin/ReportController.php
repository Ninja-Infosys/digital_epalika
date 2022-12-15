<?php

namespace Modules\ListRegistration\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::get();

        return view('plan::admin.report.index', compact('fiscalYears', 'columnData', 'planAreas', 'planLevels', 'budgetHeads', 'budgetSources'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
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

        if (!empty($request->input('from_date'))) {
            $q->whereDate('project_start_date', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('project_start_date', '<=', $request->input('to_date'));
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
