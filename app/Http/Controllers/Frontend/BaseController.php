<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        view()->share('shared_setting', OfficeSetting::first());
    }
}
