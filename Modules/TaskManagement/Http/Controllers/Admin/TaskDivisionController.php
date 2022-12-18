<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;
use Modules\TaskManagement\Http\Requests\TaskDivision\StoreTaskDivisionRequest;
use Modules\TaskManagement\Http\Requests\TaskDivision\UpdateTaskDivisionRequest;

class TaskDivisionController extends Controller
{
    public function index()
    {
        $taskDivisions = TaskDivision::with('taskCategory')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['title'], request('search'));
            }
        })
            ->latest()->paginate(10);


        return view('taskmanagement::admin.task_division.index', compact('taskDivisions'));
    }

    public function create()
    {
        $taskCategories = TaskCategory::all();

        return view('taskmanagement::admin.task_division.create', compact('taskCategories'));
    }

    public function store(StoreTaskDivisionRequest $request)
    {
        TaskDivision::create($request->validated());

        toast('कार्य विभाजन सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show($id)
    {
        return view('taskmanagement::show');
    }

    public function edit(TaskDivision $taskDivision)
    {
        $taskCategories = TaskCategory::all();

        return view('taskmanagement::admin.task_division.edit', compact('taskCategories', 'taskDivision'));
    }

    public function update(UpdateTaskDivisionRequest $request, TaskDivision $taskDivision)
    {
        $taskDivision->update($request->validated());

        toast('कार्य विभाजन सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.taskManagement.taskDivision.index'));
    }

    public function destroy(TaskDivision $taskDivision)
    {
        $taskDivision->delete();

        toast('कार्य विभाजन सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
