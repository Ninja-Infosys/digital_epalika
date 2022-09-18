<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveMeeting\MunicipalMeetingDecision;
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
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(MunicipalMeetingDecision $municipalMeetingDecision)
    {
        //
    }

    public function edit(MunicipalMeetingDecision $municipalMeetingDecision)
    {
        //
    }

    public function update(Request $request, MunicipalMeetingDecision $municipalMeetingDecision)
    {
        //
    }

    public function destroy(MunicipalMeetingDecision $municipalMeetingDecision)
    {
        //
    }
}
