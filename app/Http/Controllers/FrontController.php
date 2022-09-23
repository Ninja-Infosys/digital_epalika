<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\BaseController;
use App\Models\ExecutiveMeeting\MeetingDetail;
use App\Models\ExecutiveMeeting\MunicipalMeetingDecision;
use Illuminate\Http\Request;
use Modules\DigitalBoard\Entities\Employee;
use Modules\DigitalBoard\Entities\Notice;

class FrontController extends BaseController
{
    public function index()
    {
        $employees = Employee::orderBy('position')->get();

        $mixedNotices = Notice::query()->orderBy('date');
        $notices = $mixedNotices->where('type', 'Notice')->limit(3)->get();
        $news = $mixedNotices->where('type', 'News')->limit(3)->get();

        $meetingDetails = MunicipalMeetingDecision::with('meetingDetail')->whereHas('meetingDetail', function ($query) {
            $query->orderByDesc('meeting_date');
        })->get();

        return view('frontend.home', compact('employees', 'notices', 'news', 'meetingDetails'));
    }
}
