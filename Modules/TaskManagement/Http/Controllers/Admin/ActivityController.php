<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\Activity;
use Modules\TaskManagement\Http\Requests\Activity\StoreActivityRequest;

class ActivityController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('taskActivity_access');

        $activities = Activity::with('branch', 'activityLists')
            ->where('user_id', auth()->id())
            ->latest('date_en')
            ->paginate(50);

        return view('taskmanagement::admin.activity.index', compact('activities'));
    }

    public function create()
    {
        $this->checkAuthorization('taskActivity_create');

        return view('taskmanagement::admin.activity.create');
    }

    public function store(StoreActivityRequest $request)
    {
        $this->checkAuthorization('taskActivity_create');
    }


    public function show(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_access');
        $activity->load('activityLists.files');
        return view('taskmanagement::admin.activity.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_edit');
        $activity->load('activityLists.files');
        return view('taskmanagement::admin.activity.edit', compact('activity'));
    }


    public function destroy(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_delete');
        $activity->load('activityLists');
        foreach ($activity->activityLists as $activityList) {
            $activityList->files()->delete();
        }
        $activity->activityLists()->delete();
        $activity->delete();
        toast('सफलतापूर्वक हटाइयो', 'success');
        return redirect(route('admin.taskManagement.activity.index'));
    }
}
