<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('emap::admin.dashboard');
    }
}
