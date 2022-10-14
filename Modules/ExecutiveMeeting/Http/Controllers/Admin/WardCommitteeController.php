<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExecutiveMeeting\WardCommittee;
use App\Models\Settings\OfficeSetting;
use Illuminate\Support\Facades\Gate;
use Modules\ExecutiveMeeting\Http\Requests\WardCommittee\StoreWardCommitteeRequest;
use Modules\ExecutiveMeeting\Http\Requests\WardCommittee\UpdateWardCommitteeRequest;

class WardCommitteeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('executiveCommittee_access'),
            403,
            'You are not allowed to executive committee access'
        );

        $wardCommittees = WardCommittee::orderBy('position')->get();

        return view('executivemeeting::admin.ward_committee.index', compact('wardCommittees'));
    }

    public function create()
    {
        abort_if(Gate::denies('executiveCommittee_create'),
            403,
            'You are not allowed to executive committee create'
        );
        $officeSetting = OfficeSetting::first();

        return view('executivemeeting::admin.ward_committee.create', compact('officeSetting'));
    }

    public function store(StoreWardCommitteeRequest $request)
    {
        abort_if(Gate::denies('executiveCommittee_create'),
            403,
            'You are not allowed to executive committee create'
        );

        WardCommittee::create($request->validated());

        toast('वडा समिति  सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(WardCommittee $wardCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_access'),
            403,
            'You are not allowed to executive committee access'
        );
    }

    public function edit(WardCommittee $wardCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_edit'),
            403,
            'You are not allowed to executive committee edit'
        );

        return view('executivemeeting::admin.ward_committee.edit', compact('wardCommittee'));
    }

    public function update(UpdateWardCommitteeRequest $request, WardCommittee $wardCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_edit'),
            403,
            'You are not allowed to executive committee edit'
        );

        if ($request->hasFile('photo') && $wardCommittee->photo) {
            $this->deleteFile($wardCommittee->photo);
        }
        $wardCommittee->update($request->validated());

        toast('वडा समिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.executiveMeeting.wardCommittee.index'));
    }

    public function destroy(WardCommittee $wardCommittee)
    {
        abort_if(Gate::denies('executiveCommittee_delete'),
            403,
            'You are not allowed to executive committee delete'
        );

        if ($wardCommittee->photo) {
            $this->deleteFile($wardCommittee->photo);
        }
        $wardCommittee->delete();
        toast('वडा समिति सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
