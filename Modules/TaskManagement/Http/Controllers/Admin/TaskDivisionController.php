<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\TaskCategory;
use Modules\TaskManagement\Entities\TaskDivision;

class TaskDivisionController extends Controller
{
    public function index()
    {
        $taskDivision = TaskDivision::with('taskCategory')->get();

        return view('taskmanagement::admin.task_division.index', compact('taskDivision'));
    }

    public function create()
    {
        $taskCategories = TaskCategory::with('taskCategory')->get();

        return view('taskmanagement::admin.task_division.create', compact('taskCategories'));
    }

    public function store(Request $request)
    {
        TaskDivision::create($request->validated());

        toast('कार्य विभाजन सफलतापूर्वक थपियो','success');
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
