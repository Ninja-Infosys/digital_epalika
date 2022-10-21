<?php

namespace Modules\ExecutiveMeeting\Http\Controllers;

use App\Http\Controllers\Controller;

class CalenderController extends Controller
{
    public function index()
    {
        return view('executivemeeting::admin.calender.calender');
    }

}
