<?php

namespace Modules\TaskManagement\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        return view('taskmanagement::admin.report.index');
    }
}
