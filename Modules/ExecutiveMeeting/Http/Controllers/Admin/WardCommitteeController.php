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

        $wardCommittees = WardCommittee::filterData()->orderBy('position')
            ->where(function (Builder $q) {
                if (!is_null(request('search'))) {
                    $q->whereLike(['name', 'designation', 'phone', 'email'], request('search'));
                }
            })
            ->orderBy('position')->get()->groupBy('committee_ward');
        return view('executivemeeting::admin.ward_committee.index', compact('wardCommittees'));
    }

    public function create()
    {
        $this->checkAuthorization('executiveWardCommittee_create');
        return view('executivemeeting::admin.ward_committee.create');
    }

    public function store(StoreWardCommitteeRequest $request)
    {
        $this->checkAuthorization('executiveWardCommittee_create');
        WardCommittee::create($request->validated() + [
                'user_id' => auth()->id(),
                'committee_ward' => $request->input('committee_ward') ? $request->input('committee_ward') : auth()->user()->ward_no
            ]);
        toast('वडा समिति  सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_access');
        $this->authorize('view',$wardCommittee);
    }

    public function edit(WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_edit');
        $this->authorize('update',$wardCommittee);
        return view('executivemeeting::admin.ward_committee.edit', compact('wardCommittee'));
    }

    public function update(UpdateWardCommitteeRequest $request, WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_edit');
        if ($request->hasFile('photo') && $wardCommittee->photo) {
            $this->deleteFile($wardCommittee->photo);
        }
        $wardCommittee->update($request->validated() + [
                'committee_ward' => $request->input('committee_ward') ? $request->input('committee_ward') : auth()->user()->ward_no

            ]);

        toast('वडा समिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.wardCommittee.index'));
    }

    public function destroy(WardCommittee $wardCommittee)
    {
        $this->checkAuthorization('executiveWardCommittee_delete');
        $this->authorize('delete',$wardCommittee);
        if ($wardCommittee->photo) {
            $this->deleteFile($wardCommittee->photo);
        }
        $wardCommittee->delete();
        toast('वडा समिति सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
