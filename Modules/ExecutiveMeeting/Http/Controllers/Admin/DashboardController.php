<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('executivemeeting::admin.dashboard');
    }
}
