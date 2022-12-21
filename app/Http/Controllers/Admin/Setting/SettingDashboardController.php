<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;

class SettingDashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.setting.dashboard');
    }
}
