<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\TaskManagement\Entities\Activity;
use Modules\TaskManagement\Entities\ActivityList;
use Modules\TaskManagement\Http\Requests\Activity\StoreActivityRequest;
use Modules\TaskManagement\Http\Requests\Activity\UpdateActivityRequest;

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

        DB::transaction(function () use ($request) {
            $activity = Activity::create($request->validated() + [
                'user_id' => auth()->id(),
                'branch_id' => auth()->user()->branch_id,
                'fiscal_year_id' => officeSetting()->fiscal_year_id
            ]);
            $activity->assignedTasks()->create([
                'assigned_user_id' => auth()->id(),
                'create_user_id' => auth()->id(),
                'created_by' => auth()->user()->name
            ]);

            foreach ($request->validated()['activity_lists'] as $list) {
                $activityList = $activity->activityLists()->create($list);
                if (!empty($list['documents'])) {
                    $this->uploadDocuments($list['documents'], $activityList);
                }
            }
        });

        toast('आजको गतिविधि सफलतापूर्वक थपियो', 'success');
        return back();
    }


    public function show(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_access');

        $activity->load('activityLists.files','assignedTasks.assignedUser');
        return view('taskmanagement::admin.activity.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $this->checkAuthorization('taskActivity_edit');
        $activity->load('activityLists.files');
        return view('taskmanagement::admin.activity.edit', compact('activity'));
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $this->checkAuthorization('taskActivity_edit');

        DB::transaction(function () use ($request, $activity) {
            $activity->update($request->validated());

            foreach ($request->validated()['activity_lists'] as $list) {
                $activityList = ActivityList::updateOrCreate(
                    ['activity_id' => $activity->id, 'id' => $list['id']] ?? null,
                    $list
                );

                if (!empty($list['documents'])) {
                    $this->uploadDocuments($list['documents'], $activityList);
                }
            }
            $activity->activityLists()->whereNotIn('id', Arr::pluck($request->input('activity_lists'), 'id'))->delete();
        });

        toast('सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.taskManagement.activity.index'));
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
        return back();
    }

    private function uploadDocuments($documents, $activityList)
    {
        foreach ($documents as $document) {
            $activityList->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('task_management/' . Str::slug($activityList->title, '_'), 'public'),
            ]);
        }
    }
}
