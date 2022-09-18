<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveMeeting\MunicipalMeetingNotice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MunicipalMeetingNoticeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('executiveCommittee_access'),
            403,
            'You are not allowed to executive committee access'
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(MunicipalMeetingNotice $municipalMeetingNotice)
    {
        //
    }

    public function edit(MunicipalMeetingNotice $municipalMeetingNotice)
    {
        //
    }

    public function update(Request $request, MunicipalMeetingNotice $municipalMeetingNotice)
    {
        //
    }

    public function destroy(MunicipalMeetingNotice $municipalMeetingNotice)
    {
        //
    }
}
