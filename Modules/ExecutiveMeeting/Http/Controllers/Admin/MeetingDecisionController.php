<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\Meeting;
use Modules\ExecutiveMeeting\Entities\MeetingDecision;
use Illuminate\Database\Eloquent\Builder;
use Modules\ExecutiveMeeting\Http\Requests\MeetingDecision\StoreMeetingDecisionRequest;
use Modules\ExecutiveMeeting\Http\Requests\MeetingDecision\UpdateMeetingDecisionRequest;

class MeetingDecisionController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('meetingDecision_access');
        $meetingDecisions = MeetingDecision::with('meeting')->latest()->paginate(10);
        return view('executivemeeting::admin.meeting_decision.index', compact('meetingDecisions'));
    }

    public function create()
    {
        $this->checkAuthorization('meetingDecision_create');
        $meetings = Meeting::get();
        return view('executivemeeting::admin.meeting_decision.create', compact('meetings'));
    }

    public function store(StoreMeetingDecisionRequest $request)
    {
        $this->checkAuthorization('meetingDecision_create');
        MeetingDecision::create($request->validated());
        toast('बैठक निर्णय सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('meetingDecision_access');
    }

    public function edit(MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization( 'meetingDecision_edit');
        $meetings = Meeting::get();
        return view('executivemeeting::admin.meeting_decision.edit', compact('meetings', 'meetingDecision'));
    }

    public function update(UpdateMeetingDecisionRequest $request, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('meetingDecision_edit');

        if ($request->hasFile('decision_file')) {
            if ($meetingDecision->decision_file) {
                $this->deleteFile($meetingDecision->decision_file);
            }
        }
        $meetingDecision->update($request->validated());
        toast('बैठक निर्णय सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.meetingDecision.index'));
    }

    public function destroy(MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('meetingDecision_delete');

        if ($meetingDecision->decision_file) {
            $this->deleteFile($meetingDecision->decision_file);
        }
        $meetingDecision->delete();

        toast('बैठक निर्णय सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
