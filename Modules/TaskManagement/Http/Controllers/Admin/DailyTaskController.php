<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\DailyTask;

class DailyTaskController extends Controller
{
    public function index()
    {
        $dailyTasks = DailyTask::with('taskDivision.taskCategory')->get();
        return view('taskmanagement::admin.daily_task.index', compact('dailyTasks'));
    }

    public function create()
    {
        return view('taskmanagement::admin.daily_task.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(DailyTask $dailyTask)
    {
        $dailyTask->load('fiscalYear','taskDivision', 'files');
        return view('taskmanagement::admin.daily_task.show', compact('dailyTask'));
    }

    public function edit(DailyTask $dailyTask)
    {
        $dailyTask->load('taskDivision.taskCategory');

        return view('taskmanagement::admin.daily_task.edit', compact('dailyTask'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(DailyTask $dailyTask)
    {
        foreach ($dailyTask->files as $file){
            $this->deleteFile($file->file);
        }
        $dailyTask->files()->delete();

        $dailyTask->delete();

        toast('दैनिक कार्य सफलतापूर्वक मेटाइयो','success');
        return back();
    }
}
