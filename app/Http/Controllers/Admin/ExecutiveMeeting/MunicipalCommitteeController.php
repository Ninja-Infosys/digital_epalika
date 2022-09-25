<?php

namespace App\Http\Controllers\Admin\ExecutiveMeeting;

use App\Events\ActivityLogEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExecutiveMeeting\MunicipalCommittee\StoreMunicipalCommitteeRequest;
use App\Http\Requests\ExecutiveMeeting\MunicipalCommittee\UpdateMunicipalCommitteeRequest;
use App\Models\ExecutiveMeeting\MunicipalCommittee;
use App\Models\Settings\OfficeSetting;
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
        $officeSetting = OfficeSetting::first();

        return view('admin.executive_meeting.municipal_committee.create', compact('officeSetting'));
    }

    public function store(StoreMunicipalCommitteeRequest $request)
    {
        abort_if(Gate::denies('executiveCommittee_create'),
            403,
            'You are not allowed to executive committee create'
        );
        MunicipalCommittee::create($request->validated());

        toast('पालिका समिति  सफलतापूर्वक थपियो', 'success');
        return back();
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

        return view('admin.executive_meeting.municipal_committee.edit', compact('municipalCommittee'));
    }

    public function update(UpdateMunicipalCommitteeRequest $request, MunicipalCommittee $municipalCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_edit'),
            403,
            'You are not allowed to executive committee edit'
        );

        if ($request->hasFile('photo') && $municipalCommittee->photo) {
            $this->deleteFile($municipalCommittee->photo);
        }
        $municipalCommittee->update($request->validated());

        toast('पालिका समिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.executiveMeeting.municipalCommittee.index'));
    }

    public function destroy(MunicipalCommittee $municipalCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_delete'),
            403,
            'You are not allowed to executive committee delete'
        );

        if ($municipalCommittee->photo) {
            $this->deleteFile($municipalCommittee->photo);
        }
        $municipalCommittee->delete();

        toast('पालिका समिति सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
