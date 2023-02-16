<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('taskActivity_access');
        $activities = Activity::with('branch', 'activityLists')->latest('date_en')->paginate(50);

        return view('taskmanagement::admin.activity.index', compact('activities'));
    }

    public function create()
    {
        $this->checkAuthorization('taskActivity_create');

        return view('taskmanagement::admin.activity.create');
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('taskActivity_create');
        //
    }

    public function show(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_access');
        return view('taskmanagement::show');
    }

    public function edit(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_edit');
        $activity->load('activityLists.files');
        return view('taskmanagement::admin.activity.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $this->checkAuthorization('taskActivity_edit');
        //
    }

    public function destroy(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_delete');
        //
    }
}
