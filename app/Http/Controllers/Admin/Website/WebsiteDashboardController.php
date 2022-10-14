<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteDashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.website.dashboard');
    }
}
