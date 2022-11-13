<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Modules\TaskManagement\Entities\DailyTask;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $dailyTaskCount = DailyTask::whereDate('en_date', now()->toDateString())->count();
        $totalTaskCount = DailyTask::count();
        $totalTaskCategory = TaskCategory::count();
        $totalTaskDivision = TaskDivision::count();
        $taskData = $this->taskData();

        return view('taskmanagement::admin.dashboard', compact(
            'dailyTaskCount',
            'totalTaskCount',
            'totalTaskCategory',
            'totalTaskDivision',
            'taskData'
        ));
    }

    public function taskData(): array
    {
        $fiscalYears = FiscalYear::withCount('dailyTasks')->get();

        return [
            'labels' => $fiscalYears->pluck('title')->toArray(),
            'dataSets' => [
                [
                    'data' => $fiscalYears->pluck('daily_tasks_count')->toArray(),
                ],
            ],
        ];
    }
}
