<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveMeeting\WardMeetingDecision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WardMeetingDecisionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wardMeeting_access'),
            403,
            'You are not allowed to ward meeting access'
        );

        $wardMeetingDecisions = WardMeetingDecision::orderByDesc('date')->get();

        return view('admin.executive_meeting.wardMeeting_decision.index', compact('wardMeetingDecisions'));
    }

    public function create()
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );

        return view('admin.executive_meeting.wardMeeting_decision.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('wardMeeting_create'),
            403,
            'You are not allowed to ward meeting create'
        );
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
    }

    public function update(Request $request, WardMeetingDecision $wardMeetingDecision)
    {
        abort_if(Gate::denies('wardMeeting_edit'),
            403,
            'You are not allowed to ward meeting edit'
        );
    }

    public function destroy(WardMeetingDecision $wardMeetingDecision)
    {
        abort_if(Gate::denies('wardMeeting_delete'),
            403,
            'You are not allowed to ward meeting delete'
        );
    }
}
