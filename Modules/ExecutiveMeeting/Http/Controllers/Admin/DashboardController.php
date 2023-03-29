<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $this->checkAuthorization('executiveMeetingDashboard_access');

        $ward_meetings_count = MeetingEvent::where('event_for', 'ward')->count();
        $municipal_meetings_count = MeetingEvent::where('event_for', 'municipal')->count();

        return view('executivemeeting::admin.dashboard');
    }
}
