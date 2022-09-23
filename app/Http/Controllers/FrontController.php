<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveMeeting\MeetingDetail;
use App\Models\ExecutiveMeeting\MunicipalMeetingDecision;
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
        $news = Notice::where('type', 'News')->orderBy('date')->limit(3)->get();

        $meetingDetails = MunicipalMeetingDecision::with('meetingDetail')->whereHas('meetingDetail', function ($query) {
            $query->orderByDesc('meeting_date');
        })->get();
        $sliders = Slider::latest()->get();

        return view('frontend.home', compact('employees', 'notices', 'news', 'meetingDetails', 'sliders'));
    }
}
