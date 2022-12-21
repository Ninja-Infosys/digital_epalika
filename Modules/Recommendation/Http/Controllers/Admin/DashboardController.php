<?php

namespace Modules\Recommendation\Http\Controllers\Admin;

use App\Helper\SMS\AakashSms;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
//        dd((new AakashSms())->sendTextSMS('9864663780'));
        return view('recommendation::admin.dashboard');
    }
}
