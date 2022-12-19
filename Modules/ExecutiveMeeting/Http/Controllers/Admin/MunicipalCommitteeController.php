<?php

namespace Modules\ExecutiveMeeting\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use Modules\ExecutiveMeeting\Entities\MunicipalCommittee;
use Modules\ExecutiveMeeting\Http\Requests\MunicipalCommittee\StoreMunicipalCommitteeRequest;
use Modules\ExecutiveMeeting\Http\Requests\MunicipalCommittee\UpdateMunicipalCommitteeRequest;
use Illuminate\Database\Eloquent\Builder;

class MunicipalCommitteeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('executiveMunicipalCommittee_access');

        $municipalCommittees = MunicipalCommittee::with('province', 'district', 'localBody')->orderBy('position')
        ->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['name','phone','email'], request('search'));
            }
        })
        ->latest()->paginate(10);


        return view('executivemeeting::admin.municipal_committee.index', compact('municipalCommittees'));
    }

    public function create()
    {
        $this->checkAuthorization('executiveMunicipalCommittee_create');
        $officeSetting = OfficeSetting::first();

        return view('executivemeeting::admin.municipal_committee.create', compact('officeSetting'));
    }

    public function store(StoreMunicipalCommitteeRequest $request)
    {
        $this->checkAuthorization('executiveMunicipalCommittee_create');
        MunicipalCommittee::create($request->validated());

        toast('पालिका समिति  सफलतापूर्वक थपियो', 'success');

        return back();
    }

    // public function show(MunicipalCommittee $municipalCommittee)
    // {
    //     $this->checkAuthorization('executiveMunicipalCommittee_access');
    //     return view('executivemeeting::admin.municipal_committee.show', compact('municipalCommittee'));
    // }

    public function edit(MunicipalCommittee $municipalCommittee)
    {
        $this->checkAuthorization('executiveMunicipalCommittee_edit');

        return view('executivemeeting::admin.municipal_committee.edit', compact('municipalCommittee'));
    }

    public function update(UpdateMunicipalCommitteeRequest $request, MunicipalCommittee $municipalCommittee)
    {
        $this->checkAuthorization('executiveMunicipalCommittee_edit');

        if ($request->hasFile('photo') && $municipalCommittee->photo) {
            $this->deleteFile($municipalCommittee->photo);
        }
        $municipalCommittee->update($request->validated());

        toast('पालिका समिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.executiveMeeting.municipalCommittee.index'));
    }

    public function destroy(MunicipalCommittee $municipalCommittee)
    {
        $this->checkAuthorization('executiveMunicipalCommittee_delete');

        if ($municipalCommittee->photo) {
            $this->deleteFile($municipalCommittee->photo);
        }
        $municipalCommittee->delete();

        toast('पालिका समिति सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
