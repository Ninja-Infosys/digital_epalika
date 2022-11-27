<?php

namespace Modules\ExecutiveMeeting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\ExecutiveMeeting\Transformers\MeetingEventResource;

class CalenderController extends Controller
{
    public function index($event_for)
    {
        abort_if(
            Gate::denies($event_for . 'MeetingEvent_access'),
            403,
            'You are not allowed to access this resource'
        );
        return view('executivemeeting::admin.meeting_event.calendar', compact('event_for'));
    }

    public function getData(\Request $request, $event_for)
    {
        $meetingEvents = MeetingEvent::where(function ($query) use ($event_for) {
            if ($event_for) {
                $query->where('event_for', $event_for);
            }
        })->get();

        return MeetingEventResource::collection($meetingEvents);
    }
}
