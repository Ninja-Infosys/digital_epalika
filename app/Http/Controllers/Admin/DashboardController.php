<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nwidart\Modules\Facades\Module;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard');
    }
}
