<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailyTaskController extends Controller
{
    public function index()
    {
        return view('taskmanagement::admin.daily_task.index');
    }

    public function create()
    {
        return view('taskmanagement::admin.daily_task.create');
    }

    public function store(Request $request)
    {
        //
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
