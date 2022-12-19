<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use App\Models\Settings\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Modules\TaskManagement\Entities\DailyTask;

class ReportController extends Controller
{
    public function index()
    {
        $fiscalYears = FiscalYear::get();
        $branches=Branch::whereNull('branch_id')->get();
        $columnData = $this->getColumns();

        return view('taskmanagement::admin.report.index', compact('fiscalYears', 'columnData','branches'));
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date' => ['nullable'],
            'to_date' => ['nullable', 'after_or_equal:from_date'],
            'columns' => ['nullable', 'array']
        ]);

        $dailyTasks = DailyTask::with('branch','taskCategory','taskDivision')->where(function ($q) use ($request) {
            $this->filterDataFromUser($q, $request);
        })
            ->get();

        return response()->json([
            'view' => (string)View::make('taskmanagement::admin.report.table_data', compact('dailyTasks'))
        ]);
    }

    private function getColumns(): Collection
    {
        $columnData = collect();

        (new DailyTask())
            ->ownAndRelatedModelsFillableColumns()
            ->filter(function ($column) {
                return array_keys($column, 'DailyTask');
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
            $q->whereDate('date', '>=', $request->input('from_date'));
        }

        if (!empty($request->input('to_date'))) {
            $q->whereDate('date', '<=', $request->input('to_date'));
        }

        if (!empty($request->input('sub_branch_id'))) {
            $q->whereIn('branch_id', $request->input('sub_branch_id'));
        }

        if (!empty($request->input('task_category_id'))) {
            $q->whereIn('task_category_id', $request->input('task_category_id'));
        }

        if (!empty($request->input('task_division_id'))) {
            $q->whereIn('task_division_id', $request->input('task_division_id'));
        }
    }
}
