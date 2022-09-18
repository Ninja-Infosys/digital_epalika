<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExecutiveMeeting\MunicipalCommittee\StoreMunicipalCommitteeRequest;
use App\Http\Requests\ExecutiveMeeting\MunicipalMeetingNotice\StoreNoticeRequest;
use App\Http\Requests\ExecutiveMeeting\MunicipalMeetingNotice\UpdateNoticeRequest;
use App\Models\ExecutiveMeeting\MunicipalMeetingNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MunicipalMeetingNoticeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('municipalMeeting_access'),
            403,
            'You are not allowed to digital board news access'
        );

        $municipalMeetingNotices = MunicipalMeetingNotice::latest()->get();
        return view('admin.executive_meeting.municipalMeeting_notice.index',compact('municipalMeetingNotices'));
    }

    public function create()
    {
        abort_if(Gate::denies('municipalMeeting_create'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('admin.executive_meeting.municipalMeeting_notice.create');
    }

    public function store(StoreNoticeRequest $request)
    {
        abort_if(Gate::denies('municipalMeeting_create'),
            403,
            'You are not allowed to digital board news access'
        );

        MunicipalMeetingNotice::create($request->validated());

        return back();
    }

    public function show(MunicipalMeetingNotice $municipalMeetingNotice)
    {
        abort_if(Gate::denies('municipalMeeting_access'),
            403,
            'You are not allowed to digital board news access'
        );
    }

    public function edit(MunicipalMeetingNotice $municipalMeetingNotice)
    {
        abort_if(Gate::denies('municipalMeeting_edit'),
            403,
            'You are not allowed to digital board news access'
        );
        return view('admin.executive_meeting.municipalMeeting_notice.edit',compact('municipalMeetingNotice'));
    }

    public function update(UpdateNoticeRequest $request, MunicipalMeetingNotice $municipalMeetingNotice)
    {
        abort_if(Gate::denies('municipalMeeting_edit'),
            403,
            'You are not allowed to digital board news access'
        );

        $municipalMeetingNotice->update($request->validated());

        return redirect(route('admin.executiveMeeting.municipalMeetingNotice.index'));
    }

    public function destroy(MunicipalMeetingNotice $municipalMeetingNotice)
    {
        abort_if(Gate::denies('municipalMeeting_delete'),
            403,
            'You are not allowed to digital board news access'
        );

        $municipalMeetingNotice->delete();
        return back();
    }
}
