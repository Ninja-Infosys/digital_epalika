<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Entities\BenefitedMemberDetail;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectGrantDetail;
use Modules\Plan\Enums\GrantSourceEnum;
use Modules\Plan\Http\Requests\ProjectCostDetailRequest;

class ProjectCostDetailController extends Controller
{
    public function index(Project $project)
    {
        $project->loadSum('projectAllocatedAmounts','amount');

        return view('plan::admin.project_cost_detail.index',compact('project'));
    }
}
