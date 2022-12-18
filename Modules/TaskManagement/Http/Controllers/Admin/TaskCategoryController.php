<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Branch;
use Illuminate\Http\Request;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Http\Requests\TaskCategory\StoreTaskCategoryRequest;
use Modules\TaskManagement\Http\Requests\TaskCategory\UpdateTaskCategoryRequest;

class TaskCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'data' => TaskCategory::filterData($request->all())->get()
            ]);
        } else {
            $taskCategories = TaskCategory::with('branch')->paginate(10);

            return view('taskmanagement::admin.task_category.index', compact('taskCategories'));
        }
    }

    public function create()
    {
        $branches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('taskmanagement::admin.task_category.create', compact('branches'));
    }

    public function store(StoreTaskCategoryRequest $request)
    {
        TaskCategory::create($request->validated());

        toast('शाखाहरु अनुसार कार्यहरू सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show($id)
    {
        return view('taskmanagement::show');
    }

    public function edit(TaskCategory $taskCategory)
    {
        $branches = Branch::with('branches')->whereNull('branch_id')->get();

        return view('taskmanagement::admin.task_category.edit', compact('branches', 'taskCategory'));
    }

    public function update(UpdateTaskCategoryRequest $request, TaskCategory $taskCategory)
    {
        $taskCategory->update($request->validated());

        toast('शाखाहरु अनुसार कार्यहरू सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.taskManagement.taskCategory.index'));
    }

    public function destroy(TaskCategory $taskCategory)
    {
        $taskCategory->delete();

        toast('शाखाहरु अनुसार कार्य सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
