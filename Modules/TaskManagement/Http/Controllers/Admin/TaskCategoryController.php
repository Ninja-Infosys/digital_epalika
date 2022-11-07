<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use App\Models\Settings\Branch;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Http\Requests\TaskCategory\StoreTaskCategoryRequest;

class TaskCategoryController extends Controller
{
    public function index()
    {
        $taskCategories=TaskCategory::with('branch')->get();

        return view('taskmanagement::admin.task_category.index',compact('taskCategories'));
    }

    public function create()
    {
        $branches=Branch::with('branches')->get();

        return view('taskmanagement::admin.task_category.create',compact('branches'));
    }

    public function store(StoreTaskCategoryRequest $request)
    {
        TaskCategory::create($request->validated());

        toast('शाखाहरु अनुसार कार्यहरू सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show($id)
    {
        return view('taskmanagement::show');
    }

    public function edit($id)
    {
        return view('taskmanagement::edit');
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
