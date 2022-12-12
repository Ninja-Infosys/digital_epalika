<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\ProjectStatusEnum;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $not_started_project_count=Project::where('project_status',ProjectStatusEnum::NOT_STARTED)->count();
        $in_progress_project_count=Project::where('project_status',ProjectStatusEnum::IN_PROGRESS)->count();
        $completed_project_count=Project::where('project_status',ProjectStatusEnum::COMPLETED)->count();

        return view('plan::admin.dashboard',compact('not_started_project_count','in_progress_project_count','completed_project_count'));
    }
}
