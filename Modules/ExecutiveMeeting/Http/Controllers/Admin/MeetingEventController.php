<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\ExecutiveMeeting\Http\Requests\MeetingEvent\StoreMeetingEventRequest;
use Modules\ExecutiveMeeting\Http\Requests\MeetingEvent\UpdateMeetingEventRequest;
use Illuminate\Database\Eloquent\Builder;
class MeetingEventController extends Controller
{
    public function index($event_for)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_access');

        $meetingEvents = MeetingEvent::where('event_for', $event_for)
            ->whereDate('en_start_date', '<=', today()->toDateString())
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['event_name','start_date','description'], request('search'));
                }
            })
            ->latest()->paginate(10);


        return view('executivemeeting::admin.meeting_event.index', compact('event_for', 'meetingEvents'));
    }

    public function upcomingMeetings($event_for)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_access');

        $meetingEvents = MeetingEvent::where('event_for', $event_for)
            ->whereDate('en_start_date', '>', today()->toDateString())
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['event_name','start_date','description'], request('search'));
                }
            })
            ->latest()->paginate(10);

        return view('executivemeeting::admin.meeting_event.upcoming_meeting', compact('event_for', 'meetingEvents'));
    }

    public function create($event_for)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_create');

        return view('executivemeeting::admin.meeting_event.create', compact('event_for'));
    }

    public function store(StoreMeetingEventRequest $request, $event_for)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_create');
        MeetingEvent::create($request->validated() + [
            'event_for' => $event_for,
        ]);

        toast('बैठक सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show($event_for, MeetingEvent $meetingEvent)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_access');
        return view('executivemeeting::show');
    }

    public function edit($event_for, MeetingEvent $meetingEvent)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_edit');
        return view('executivemeeting::admin.meeting_event.edit', compact('event_for', 'meetingEvent'));
    }

    public function update(UpdateMeetingEventRequest $request, $event_for, MeetingEvent $meetingEvent)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_edit');

        $meetingEvent->update($request->validated());

        toast('बैठक सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.meetingEvent.index', $event_for));
    }

    public function destroy($event_for, MeetingEvent $meetingEvent)
    {
        $this->checkAuthorization($event_for.'MeetingEvent_delete');

        $meetingEvent->delete();

        toast('बैठक सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
