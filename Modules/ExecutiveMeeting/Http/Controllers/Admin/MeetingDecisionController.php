<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\ExecutiveMeeting\Entities\MeetingDecision;
use Modules\ExecutiveMeeting\Entities\MeetingEvent;
use Modules\ExecutiveMeeting\Http\Requests\MeetingDecision\StoreMeetingDecisionRequest;
use Modules\ExecutiveMeeting\Http\Requests\MeetingDecision\UpdateMeetingDecisionRequest;

class MeetingDecisionController extends Controller
{
    public function index($meeting_for)
    {

        $this->checkAuthorization('MeetingDecision_access');

        $meetingDecisions = MeetingDecision::with('meetingEvent')->where('meeting_for', $meeting_for)->latest()->get();

        return view('executivemeeting::admin.meeting_decision.index', compact('meeting_for', 'meetingDecisions'));
    }

    public function create($meeting_for)
    {
        $this->checkAuthorization('MeetingDecision_create');

        $meetingEvents = MeetingEvent::where('event_for', $meeting_for)
            ->whereDate('en_start_date', '<=', today()->toDateString())
            ->latest()->get();

        return view('executivemeeting::admin.meeting_decision.create', compact('meeting_for', 'meetingEvents'));
    }

    public function store(StoreMeetingDecisionRequest $request, $meeting_for)
    {
        $this->checkAuthorization('MeetingDecision_create');

        MeetingDecision::create($request->validated() + [
                'meeting_for' => $meeting_for,
            ]);

        toast('बैठक निर्णय सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show($meeting_for, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('MeetingDecision_access');
    }

    public function edit($meeting_for, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('MeetingDecision_edit');

        $meetingEvents = MeetingEvent::where('event_for', $meeting_for)
            ->whereDate('en_start_date', '<=', today()->toDateString())
            ->latest()->get();

        return view('executivemeeting::admin.meeting_decision.edit', compact('meeting_for', 'meetingEvents', 'meetingDecision'));
    }

    public function update(UpdateMeetingDecisionRequest $request, $meeting_for, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('MeetingDecision_edit');

        if ($request->hasFile('decision_file')) {
            if ($meetingDecision->decision_file) {
                $this->deleteFile($meetingDecision->decision_file);
            }
        }

        $meetingDecision->update($request->validated());

        toast('बैठक निर्णय सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.meetingDecision.index', $meeting_for));
    }

    public function destroy($meeting_for, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('MeetingDecision_delete');

        if ($meetingDecision->decision_file) {
            $this->deleteFile($meetingDecision->decision_file);
        }
        $meetingDecision->delete();

        toast('बैठक निर्णय सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
