<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\MeetingDetail;
use Modules\ExecutiveMeeting\Entities\MunicipalMeetingNotice;
use Modules\ExecutiveMeeting\Entities\WardMeetingNotice;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $ward_meetings_count = MeetingDetail::where('model_type', WardMeetingNotice::class)->count();
        $municipal_meetings_count = MeetingDetail::where('model_type', MunicipalMeetingNotice::class)->count();
        return view('executivemeeting::admin.dashboard');
    }
}
