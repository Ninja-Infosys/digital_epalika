<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
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
        $taskData = $this->taskDataYearWise();
        $weeklyTasks=$this->weeklyTasks();

        return view('taskmanagement::admin.dashboard', compact(
            'dailyTaskCount',
            'totalTaskCount',
            'totalTaskCategory',
            'totalTaskDivision',
            'taskData',
            'weeklyTasks'
        ));
    }

    public function taskDataYearWise(): array
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

    public function weeklyTasks()
    {
        $weeklyData=collect();
        $weekDays=CarbonPeriod::create(now()->subWeek()->toDateString(),'1 day',now()->toDateString());
        foreach ($weekDays as $weekDay){
            $weeklyData->push([
                'date'=>$weekDay->toDateString(),
                'tasks_count'=>DailyTask::whereDate('en_date',$weekDay->toDateString())->count()
            ]);
        }

        return [
            'labels' => $weeklyData->pluck('date')->toArray(),
            'dataSets' => [
                [
                    'data' => $weeklyData->pluck('tasks_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ],
            ],
        ];
    }
}
