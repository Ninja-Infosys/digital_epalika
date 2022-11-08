<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\DailyTask;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $dailyTaskCount=DailyTask::whereDate('en_date',now()->toDateString())->count();

        return view('taskmanagement::admin.dashboard',compact('dailyTaskCount'));
    }
}
