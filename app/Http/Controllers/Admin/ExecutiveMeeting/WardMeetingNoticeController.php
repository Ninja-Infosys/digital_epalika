<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExecutiveMeeting\WardMeetingNotice\StoreNoticeRequest;
use App\Http\Requests\ExecutiveMeeting\WardMeetingNotice\UpdateNoticeRequest;
use App\Models\ExecutiveMeeting\WardMeetingNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WardMeetingNoticeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wardMeeting_access'),
            403,
            'You are not allowed to ward meeting access'
        );

        $wardMeetingNotices = WardMeetingNotice::orderByDesc('broadcast_date')->get();

        return view('admin.executive_meeting.wardMeeting_notice.index', compact('wardMeetingNotices'));
    }

    public function create()
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );

        return view('admin.executive_meeting.wardMeeting_notice.create');
    }

    public function store(StoreNoticeRequest $request)
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );
    }

    public function show(WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_access'),
            403,
            'You are not allowed to ward meeting access'
        );
    }

    public function edit(WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_edit'),
            403,
            'You are not allowed to ward meeting edit'
        );

        return view('admin.executive_meeting.wardMeeting_notice.edit', compact('wardMeetingNotice'));
    }

    public function update(UpdateNoticeRequest $request, WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_edit'),
            403,
            'You are not allowed to ward meeting edit'
        );
    }

    public function destroy(WardMeetingNotice $wardMeetingNotice)
    {
        abort_if(Gate::denies('wardMeeting_delete'),
            403,
            'You are not allowed to ward meeting delete'
        );
    }
}
