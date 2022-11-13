<?php

namespace Modules\HelpDesk\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('helpdesk::admin.dashboard');
    }
}
