<?php

namespace Modules\Plan\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Entities\ConsumerCommittee;
use Modules\Plan\Entities\ConsumerCommitteeOfficial;
use Modules\Plan\Entities\Project;
use Modules\Plan\Enums\ConsumerCommitteePostEnum;
use Modules\Plan\Enums\ProjectStatusEnum;

class ConsumerCommitteeController extends Controller
{
    public function index(Project $project)
    {
        return view('plan::admin.consumer_committee.index', compact('project'));
    }

    public function create(Project $project)
    {
        return view('plan::create');
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
