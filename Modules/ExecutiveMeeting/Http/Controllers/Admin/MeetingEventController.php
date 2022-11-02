<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\ExecutiveMeeting\Http\Requests\MeetingEvent\StoreMeetingEventRequest;
use Modules\ExecutiveMeeting\Http\Requests\MeetingEvent\UpdateMeetingEventRequest;

class MeetingEventController extends Controller
{
    public function index($event_for)
    {
        abort_if(Gate::denies('meetingEvent_access'),
            403,
            'You are not allowed to access this resource'
        );

        $meetingEvents = MeetingEvent::where('event_for', $event_for)
            ->whereDate('en_start_date', '<=', today()->toDateString())
            ->latest()->paginate(15);

        return view('executivemeeting::admin.meeting_event.index', compact('event_for', 'meetingEvents'));
    }

    public function upcomingMeetings($event_for)
    {
        abort_if(Gate::denies('meetingEvent_access'),
            403,
            'You are not allowed to access this resource'
        );

        $meetingEvents = MeetingEvent::where('event_for', $event_for)
            ->whereDate('en_start_date', '>', today()->toDateString())
            ->latest()->paginate(15);

        return view('executivemeeting::admin.meeting_event.upcoming_meeting', compact('event_for','meetingEvents'));
    }

    public function create($event_for)
    {
        abort_if(Gate::denies('meetingEvent_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('executivemeeting::admin.meeting_event.create', compact('event_for'));
    }

    public function store(StoreMeetingEventRequest $request, $event_for)
    {
        abort_if(Gate::denies('meetingEvent_create'),
            403,
            'You are not allowed to access this resource'
        );

        MeetingEvent::create($request->validated() + [
                'event_for' => $event_for
            ]);

        toast('Event Added Successfully', 'success');
        return back();
    }

    public function show($event_for, MeetingEvent $meetingEvent)
    {
        abort_if(Gate::denies('meetingEvent_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('executivemeeting::show');
    }

    public function edit($event_for, MeetingEvent $meetingEvent)
    {
        abort_if(Gate::denies('meetingEvent_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('executivemeeting::admin.meeting_event.edit', compact('event_for', 'meetingEvent'));
    }

    public function update(UpdateMeetingEventRequest $request, $event_for, MeetingEvent $meetingEvent)
    {
        abort_if(Gate::denies('meetingEvent_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $meetingEvent->update($request->validated());

        toast('Meeting Event Updated Successfully', 'success');

        return redirect(route('admin.executiveMeeting.meetingEvent.index'));
    }

    public function destroy($event_for, MeetingEvent $meetingEvent)
    {
        abort_if(Gate::denies('meetingEvent_delete'),
            403,
            'You are not allowed to access this resource'
        );

        $meetingEvent->delete();

        toast('Meeting Event Deleted Successfully', 'success');

        return back();
    }
}
