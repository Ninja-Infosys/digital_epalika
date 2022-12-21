<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('grant::admin.dashboard');
    }
}
