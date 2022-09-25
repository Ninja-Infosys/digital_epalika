<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = ActivityLog::with('user')->filter()->latest()->paginate(2);

        return view('admin.activity_log.index', compact('activityLogs'));
    }
}
