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

    public function contact()
    {
        return view('frontend.static.contact.index');
    }

    public function introduction()
    {
        return view('frontend.static.introduction');
    }
    public function category()
    {
        return view('frontend.static.category.category');
    }
    public function representative()
    {
        return view('frontend.static.representive.representive');
    }
    public function audio()
    {
        return view('frontend.static.gallery.audio.index');
    }
    public function photo()
    {
        return view('frontend.static.gallery.photo.index');
    }
    public function single_photo()
    {
        return view('frontend.static.gallery.photo.single-photo');
    }
    public function video()
    {
        return view('frontend.static.gallery.video.index');
    }
    public function employee()
    {
        return view('frontend.static.employee.index');
    }
    public function executive()
    {
        return view('frontend.static.executive-board.index');
    }
    public function single_executive()
    {
        return view('frontend.static.executive-board.single-executive-board');
    }
    public function service_details()
    {
        return view('frontend.static.chat.service');
    }
}
