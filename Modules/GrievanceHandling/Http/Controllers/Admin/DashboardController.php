<?php

namespace Modules\GrievanceHandling\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('grievancehandling::admin.dashboard');
    }
}
