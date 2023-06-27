<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\TaskManagement\Entities\FileTracking;

class FileTrackingController extends Controller
{
    public function index()
    {
        $fileTrackings = FileTracking::with('user')->paginate(10);

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
