<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\TaskManagement\Entities\FileTracking;

class FileTrackingController extends Controller
{
    public function index()
    {
        $fileTrackings = FileTracking::with('user')
            ->whereHas('fileActivities', function ($query) {
                $query->whereHas('users', function ($q) {
                    $q->where('file_activity_user.user_id', auth()->id());
                });
            })
            ->orWhere('user_id', auth()->id())
            ->paginate(10);

        return view('taskmanagement::admin.fileTracking.index', compact('fileTrackings'));
    }

    public function create()
    {
        return view('taskmanagement::admin.fileTracking.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(FileTracking $fileTracking)
    {
        $fileTracking->load(['fileActivities' => function ($query) {
            $query->with('users','assignedBy');
            $query->filterData();
        }, 'user', 'fileTrackingFiles']);

        $users = User::all();

        return view('taskmanagement::admin.fileTracking.show', compact('fileTracking', 'users'));
    }

    public function edit($id)
    {
        return view('taskmanagement::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(FileTracking $fileTracking)
    {
        foreach ($fileTracking->fileTrackingFiles as $fileTrackingFile) {
            $fileTrackingFile->files()->delete();
        }
        $fileTracking->fileTrackingFiles()->delete();
        foreach ($fileTracking->fileActivities as $fileActivity) {
            $fileActivity->users()->detach();
        }
        $fileTracking->fileActivities()->delete();
        $fileTracking->delete();

        toast('File Tracking Deleted Successfully', 'success');
        return back();
    }
}
