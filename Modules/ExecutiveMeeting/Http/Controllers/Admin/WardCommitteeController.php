<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Modules\ExecutiveMeeting\Entities\WardCommittee;
use Modules\ExecutiveMeeting\Http\Requests\WardCommittee\StoreWardCommitteeRequest;
use Modules\ExecutiveMeeting\Http\Requests\WardCommittee\UpdateWardCommitteeRequest;
use Illuminate\Database\Eloquent\Builder;

class WardCommitteeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('executiveWardCommittee_access');

        $wardCommittees = WardCommittee::orderBy('position')
        ->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['name','designation','phone','email'], request('search'));
            }
        })
        ->latest()->paginate(10);


        return view('executivemeeting::admin.ward_committee.index', compact('wardCommittees'));
    }

    public function create()
    {
        $this->checkAuthorization('executiveWardCommittee_create');
        $officeSetting = OfficeSetting::first();

        return view('executivemeeting::admin.ward_committee.create', compact('officeSetting'));
    }

    public function store(StoreWardCommitteeRequest $request)
    {
        $this->checkAuthorization('executiveWardCommittee_create');

        WardCommittee::create($request->validated());

        toast('वडा समिति  सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_access');
    }

    public function edit(WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_edit');

        return view('executivemeeting::admin.ward_committee.edit', compact('wardCommittee'));
    }

    public function update(UpdateWardCommitteeRequest $request, WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_edit');

        if ($request->hasFile('photo') && $wardCommittee->photo) {
            $this->deleteFile($wardCommittee->photo);
        }
        $wardCommittee->update($request->validated());

        toast('वडा समिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.wardCommittee.index'));
    }

    public function destroy(WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_delete');

        if ($wardCommittee->photo) {
            $this->deleteFile($wardCommittee->photo);
        }
        $wardCommittee->delete();
        toast('वडा समिति सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
