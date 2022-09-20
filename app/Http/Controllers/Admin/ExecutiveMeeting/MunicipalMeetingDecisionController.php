<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExecutiveMeeting\MunicipalMeetingDecision\StoreDecisionRequest;
use App\Http\Requests\ExecutiveMeeting\MunicipalMeetingDecision\UpdateDecisionRequest;
use App\Models\ExecutiveMeeting\MunicipalMeetingDecision;
use App\Models\ExecutiveMeeting\MunicipalMeetingNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MunicipalMeetingDecisionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('municipalMeeting_access'),
            403,
            'You are not allowed to municipal meeting access'
        );

        $municipalMeetingDecisions = MunicipalMeetingDecision::with('municipalMeetingNotice')->latest()->get();

        return view('admin.executive_meeting.municipalMeeting_decision.index', compact('municipalMeetingDecisions'));
    }

    public function create()
    {
        abort_if(Gate::denies('municipalMeeting_create'),
            403,
            'You are not allowed to municipal meeting access'
        );

        $municipalMeetingNotices = MunicipalMeetingNotice::latest()->get();


        return view('admin.executive_meeting.municipalMeeting_decision.create', compact('municipalMeetingNotices'));
    }

    public function store(StoreDecisionRequest $request)
    {
        abort_if(Gate::denies('municipalMeeting_create'),
            403,
            'You are not allowed to municipal meeting access'
        );

        MunicipalMeetingDecision::create($request->validated());

        toast('नगरपालिका बैठक निर्णय सफलतापूर्वक थपियो','success');

        return back();
    }

    public function show(MunicipalMeetingDecision $municipalMeetingDecision)
    {
        abort_if(Gate::denies('municipalMeeting_access'),
            403,
            'You are not allowed to municipal meeting access'
        );
    }

    public function edit(MunicipalMeetingDecision $municipalMeetingDecision)
    {
        abort_if(Gate::denies('municipalMeeting_edit'),
            403,
            'You are not allowed to municipal meeting access'
        );

        $municipalMeetingNotices = MunicipalMeetingNotice::latest()->get();
        return view('admin.executive_meeting.municipalMeeting_decision.edit',compact('municipalMeetingDecision','municipalMeetingNotices'));
    }

    public function update(UpdateDecisionRequest $request, MunicipalMeetingDecision $municipalMeetingDecision)
    {
        abort_if(Gate::denies('municipalMeeting_edit'),
            403,
            'You are not allowed to municipal meeting access'
        );

        if ($request->hasFile('decision_file')) {
            if ($municipalMeetingDecision->decision_file) {
                $this->deleteFile($municipalMeetingDecision->decision_file);
            }
        }

        $municipalMeetingDecision->update($request->validated());

        toast('नगरपालिका बैठक निर्णय सफलतापूर्वक अद्यावधिक गरियो','success');
        return redirect(route('admin.executiveMeeting.municipalMeetingDecision.index'));
    }

    public function destroy(MunicipalMeetingDecision $municipalMeetingDecision)
    {
        abort_if(Gate::denies('municipalMeeting_delete'),
            403,
            'You are not allowed to municipal meeting access'
        );

        if ($municipalMeetingDecision->decision_file) {
            $this->deleteFile($municipalMeetingDecision->decision_file);
        }
        $municipalMeetingDecision->delete();

        toast('नगरपालिका बैठक निर्णय सफलतापूर्वक हटाइयो','success');

        return back();
    }
}
