<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveMeeting\MeetingDetail;
use App\Models\ExecutiveMeeting\MunicipalMeetingDecision;
use App\Models\Website\MunicipalDetail;
use App\Models\Website\Slider;
use Illuminate\Http\Request;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;

class FrontController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('position')->get();

        $notices = Notice::where('type', 'Notice')->orderBy('date')->limit(3)->get();
        $newses = Notice::where('type', 'News')->orderBy('date')->limit(3)->get();

        $meetingDetails = MunicipalMeetingDecision::with('meetingDetail')->whereHas('meetingDetail', function ($query) {
            $query->orderByDesc('meeting_date');
        })->get();
        $sliders = Slider::latest()->get();
        $municipalDetails = MunicipalDetail::all();

        return view('frontend.home', compact('employees', 'notices', 'newses', 'meetingDetails', 'sliders', 'municipalDetails'));
    }

    public function notice()
    {
        $notices = Notice::where('type', 'Notice')->orderBy('date')->get();
        return view('frontend.static.notice.index', compact('notices'));
    }

    public function singleNotice(Notice $notice)
    {
        $notice->load('files');
        return view('frontend.static.notice.single-notice', compact('notice'));
    }
}
