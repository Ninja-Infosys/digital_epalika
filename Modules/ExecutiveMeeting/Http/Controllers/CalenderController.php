<?php

namespace Modules\ExecutiveMeeting\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\ExecutiveMeeting\Transformers\MeetingEventResource;

class CalenderController extends Controller
{
    public function index()
    {
        return view('executivemeeting::admin.calender.calender');
    }

    public function getData(\Request $request)
    {
        $meetingEvents=MeetingEvent::get();

        return MeetingEventResource::collection($meetingEvents);
    }

}
