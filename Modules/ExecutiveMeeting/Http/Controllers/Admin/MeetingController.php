<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\ExecutiveMeeting\Entities\Committee;
use Modules\ExecutiveMeeting\Entities\Meeting;
use Modules\ExecutiveMeeting\Http\Requests\Meeting\StoreMeetingRequest;
use Modules\ExecutiveMeeting\Http\Requests\Meeting\UpdateMeetingRequest;

class MeetingController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('meeting_access');

        $meetings = Meeting::with('committee')->whereDate('en_start_date', '<=', today()->toDateString())
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['meeting_name', 'start_date', 'description'], request('search'));
                }
            })
            ->paginate(10);

        return view('executivemeeting::admin.meeting.index', compact('meetings'));
    }

    public function create()
    {
        $this->checkAuthorization('meeting_create');

        $committees = Committee::all();

        return view('executivemeeting::admin.meeting.create', compact('committees'));
    }

    public function store(StoreMeetingRequest $request)
    {
        $this->checkAuthorization('meeting_create');

        DB::transaction(function () use ($request) {
            $meeting = Meeting::create($request->validated() + [
                'user_id' => auth()->id(),
                'fiscal_year_id' => officeSetting()->fiscal_year_id,
            ]);

            foreach ($request->input('meetingAgendas') as $meetingAgenda) {
                $meeting->meetingAgendas()->create($meetingAgenda);
            }
        });

        if ($request->ajax()) {
            return response()->json([
                'data' => "",
                'message' => "बैठक सफलतापूर्वक थपियो"
            ]);
        }

        toast('बैठक सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function edit(Meeting $meeting)
    {
        $this->checkAuthorization('meeting_edit');

        $committees = Committee::all();

        return view('executivemeeting::admin.meeting.edit', compact('meeting', 'committees'));
    }

    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        $this->checkAuthorization('meeting_edit');

        $meeting->update($request->validated());

        if ($request->ajax()) {
            return response()->json([
                'data' => "",
                'message' => "बैठक सफलतापूर्वक अद्यावधिक गरियो"
            ]);
        }

        toast('बैठक सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.meeting.index'));
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        toast('बैठक सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
