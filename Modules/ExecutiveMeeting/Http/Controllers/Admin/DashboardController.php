<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Models\ExecutiveMeeting\MeetingDetail;
use App\Models\ExecutiveMeeting\MunicipalMeetingNotice;
use App\Models\ExecutiveMeeting\WardMeetingNotice;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $ward_meetings_count = MeetingDetail::where('model_type', WardMeetingNotice::class)->count();
        $municipal_meetings_count = MeetingDetail::where('model_type', MunicipalMeetingNotice::class)->count();
        return view('executivemeeting::admin.dashboard');
    }
}
