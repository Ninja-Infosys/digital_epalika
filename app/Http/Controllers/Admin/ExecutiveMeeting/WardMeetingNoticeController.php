<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
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
    }

    public function create()
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );
    }

    public function store(Request $request)
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
    }

    public function update(Request $request, WardMeetingNotice $wardMeetingNotice)
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
