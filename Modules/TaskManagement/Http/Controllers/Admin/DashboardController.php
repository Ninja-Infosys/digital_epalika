<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\DailyTask;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $dailyTaskCount=DailyTask::whereDate('en_date',now()->toDateString())->count();
        $totalTaskCount=DailyTask::all()->count();
        $totalTaskCategory=TaskCategory::all()->count();
        $totalTaskDivision=TaskDivision::all()->count();

        return view('taskmanagement::admin.dashboard',compact('dailyTaskCount',
            'totalTaskCount', 'totalTaskCategory', 'totalTaskDivision'));
    }
}
