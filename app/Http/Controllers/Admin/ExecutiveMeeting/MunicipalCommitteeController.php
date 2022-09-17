<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExecutiveMeeting\MunicipalCommittee\StoreMunicipalCommitteeRequest;
use App\Models\ExecutiveMeeting\MunicipalCommittee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MunicipalCommitteeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('executiveCommittee_access'),
            403,
            'You are not allowed to executive committee access'
        );

        $municipalCommittees = MunicipalCommittee::with('province', 'district', 'localBody')->orderBy('position')->get();

        return view('admin.executive_meeting.municipal_committee.index', compact('municipalCommittees'));
    }

    public function create()
    {
        abort_if(Gate::denies('executiveCommittee_create'),
            403,
            'You are not allowed to executive committee create'
        );
    }

    public function store(StoreMunicipalCommitteeRequest $request)
    {
        abort_if(Gate::denies('executiveCommittee_create'),
            403,
            'You are not allowed to executive committee create'
        );
    }

    public function show(MunicipalCommittee $municipalCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_access'),
            403,
            'You are not allowed to executive committee access'
        );
    }

    public function edit(MunicipalCommittee $municipalCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_edit'),
            403,
            'You are not allowed to executive committee edit'
        );
    }

    public function update(Request $request, MunicipalCommittee $municipalCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_edit'),
            403,
            'You are not allowed to executive committee edit'
        );
    }

    public function destroy(MunicipalCommittee $municipalCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_delete'),
            403,
            'You are not allowed to executive committee delete'
        );
    }
}
