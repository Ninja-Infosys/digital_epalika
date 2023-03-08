<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Plan\Entities\Project;
use Modules\Plan\Entities\ProjectBidDetail;
use Modules\Plan\Enums\ProjectStatusEnum;

class ProjectBidDetailController extends Controller
{
    public function index(Project $project)
    {
        return redirect(route('admin.plan.project.projectBidDetail.create', $project));

        return view('plan::admin.project_bid_detail.index', compact('project'));
    }

    public function create(Project $project)
    {
        return view('plan::admin.project_bid_detail.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {

    }

    public function show($id)
    {
        return view('plan::show');
    }

    public function edit($id)
    {
        return view('plan::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
