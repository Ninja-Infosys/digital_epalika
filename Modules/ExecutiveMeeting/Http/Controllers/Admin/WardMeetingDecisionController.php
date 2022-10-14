<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveMeeting\MeetingDetail;
use App\Models\ExecutiveMeeting\WardMeetingDecision;
use App\Models\ExecutiveMeeting\WardMeetingNotice;
use Illuminate\Support\Facades\Gate;
use Modules\ExecutiveMeeting\Http\Requests\WardMeetingDecision\StoreDecisionRequest;
use Modules\ExecutiveMeeting\Http\Requests\WardMeetingDecision\UpdateDecisionRequest;

class WardMeetingDecisionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wardMeeting_access'),
            403,
            'You are not allowed to ward meeting access'
        );

        $wardMeetingDecisions = WardMeetingDecision::with('meetingDetail')->orderByDesc('date')->get();

        return view('executivemeeting::admin.wardMeeting_decision.index', compact('wardMeetingDecisions'));
    }

    public function create()
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );

        $meetingDetails = MeetingDetail::where('model_type', WardMeetingNotice::class)->latest()->get();

        return view('executivemeeting::admin.wardMeeting_decision.create', compact('meetingDetails'));
    }

    public function store(StoreDecisionRequest $request)
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );

        WardMeetingDecision::create($request->validated());

        toast('वार्ड बैठक निर्णय सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.executiveMeeting.wardMeetingDecision.index'));
    }

    public function show(WardMeetingDecision $wardMeetingDecision)
    {
        abort_if(Gate::denies('wardMeeting_access'),
            403,
            'You are not allowed to ward meeting access'
        );
    }

    public function edit(WardMeetingDecision $wardMeetingDecision)
    {
        abort_if(Gate::denies('wardMeeting_edit'),
            403,
            'You are not allowed to ward meeting edit'
        );

        $meetingDetails = MeetingDetail::where('model_type', WardMeetingNotice::class)->latest()->get();

        return view('executivemeeting::admin.wardMeeting_decision.edit', compact('meetingDetails', 'wardMeetingDecision'));
    }

    public function update(UpdateDecisionRequest $request, WardMeetingDecision $wardMeetingDecision)
    {
        abort_if(Gate::denies('wardMeeting_edit'),
            403,
            'You are not allowed to ward meeting edit'
        );
        if ($request->hasFile('decision_file') && $wardMeetingDecision->decision_file) {
            $this->deleteFile($wardMeetingDecision->decision_file);
        }

        $wardMeetingDecision->update($request->validated());

        toast('वार्ड बैठक सूचना सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.executiveMeeting.wardMeetingDecision.index'));
    }

    public function destroy(WardMeetingDecision $wardMeetingDecision)
    {
        abort_if(Gate::denies('wardMeeting_delete'),
            403,
            'You are not allowed to ward meeting delete'
        );

        if ($wardMeetingDecision->decision_file) {
            $this->deleteFile($wardMeetingDecision->decision_file);
        }
        $wardMeetingDecision->delete();

        toast('वडा बैठक निर्णय सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
