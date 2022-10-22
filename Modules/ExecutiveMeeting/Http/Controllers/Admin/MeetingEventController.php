<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\ExecutiveMeeting\Http\Requests\MeetingEvent\StoreMeetingEventRequest;
use Modules\ExecutiveMeeting\Http\Requests\MeetingEvent\UpdateMeetingEventRequest;

class MeetingEventController extends Controller
{
    public function index()
    {
        $meetingEvents=MeetingEvent::paginate(10);

        return view('executivemeeting::admin.meeting_event.index',compact('meetingEvents'));
    }

    public function create()
    {
        return view('executivemeeting::admin.meeting_event.create');
    }

    public function store(StoreMeetingEventRequest $request)
    {
        MeetingEvent::create($request->validated());

        toast('Event Added Successfully','success');
        return back();
    }

    public function show(MeetingEvent $meetingEvent)
    {
        return view('executivemeeting::show');
    }

    public function edit(MeetingEvent $meetingEvent)
    {
        return view('executivemeeting::admin.meeting_event.edit',compact('meetingEvent'));
    }

    public function update(UpdateMeetingEventRequest $request, MeetingEvent $meetingEvent)
    {
        $meetingEvent->update($request->validated());

        toast('Meeting Event Updated Successfully','success');

        return redirect(route('admin.executiveMeeting.meetingEvent.index'));
    }

    public function destroy(MeetingEvent $meetingEvent)
    {
        $meetingEvent->delete();

        toast('Meeting Event Deleted Successfully','success');

        return back();
    }
}
