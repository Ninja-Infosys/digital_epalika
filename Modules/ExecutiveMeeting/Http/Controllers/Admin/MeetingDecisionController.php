<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\Meeting;
use Modules\ExecutiveMeeting\Entities\MeetingDecision;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\ExecutiveMeeting\Http\Requests\MeetingDecision\StoreMeetingDecisionRequest;
use Modules\ExecutiveMeeting\Http\Requests\MeetingDecision\UpdateMeetingDecisionRequest;

class MeetingDecisionController extends Controller
{
    public function index(Meeting $meeting)
    {
        $this->checkAuthorization('meetingDecision_access');

        $meeting->load('meetingDecisions.meetingAgenda');

        return view('executivemeeting::admin.meeting_decision.index', compact('meeting'));
    }

    public function create(Meeting $meeting)
    {
        $this->checkAuthorization('meetingDecision_create');

        $meeting->load(['meetingAgendas' => function ($query) {
            $query->with('meetingDecision');
            $query->where('is_final', 1);
        }]);

        return view('executivemeeting::admin.meeting_decision.create', compact('meeting'));
    }

    public function store(StoreMeetingDecisionRequest $request, Meeting $meeting)
    {
        $this->checkAuthorization('meetingDecision_create');

        DB::transaction(function () use ($request, $meeting) {
            foreach ($request->input('meetingDecisions') as $meetingDecision) {
                MeetingDecision::updateOrCreate(
                    ['meeting_id' => $meeting->id, 'meeting_agenda_id' => $meetingDecision['meeting_agenda_id']],
                    [
                        'date' => $meetingDecision['date'],
                        'en_date' => $meetingDecision['en_date'],
                        'description' => $meetingDecision['description'],
                        'user_id' => auth()->id()
                    ]
                );
            }
        });

        toast('बैठक निर्णय सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.executiveMeeting.meeting.meetingDecision.index', $meeting));
    }

    public function show(Meeting $meeting, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('meetingDecision_access');
    }

    public function edit(Meeting $meeting, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('meetingDecision_edit');

        $meeting->load(['meetingAgendas' => function ($query) {
            $query->where('is_final', 1);
        }]);

        return view('executivemeeting::admin.meeting_decision.edit', compact('meeting', 'meetingDecision'));
    }

    public function update(UpdateMeetingDecisionRequest $request, Meeting $meeting, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('meetingDecision_edit');

        $meetingDecision->update($request->validated());

        toast('बैठक निर्णय सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.meeting.meetingDecision.index', $meeting));
    }

    public function destroy(Meeting $meeting, MeetingDecision $meetingDecision)
    {
        $this->checkAuthorization('meetingDecision_delete');

        $meetingDecision->delete();

        toast('बैठक निर्णय सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
