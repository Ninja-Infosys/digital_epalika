<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Designation;
use Modules\JudicialCommittee\Entities\JudicialMember;
use Modules\JudicialCommittee\Http\Requests\JudicialMember\StoreJudicialMemberRequest;
use Modules\JudicialCommittee\Http\Requests\JudicialMember\UpdateJudicialMemberRequest;

class JudicialMemberController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('judicialMember_access');

        $judicialMembers = JudicialMember::with('designation', 'province', 'district', 'localBody')->orderBy('position')->get();

        return view('judicialcommittee::admin.judicial_member.index', compact('judicialMembers'));
    }

    public function create()
    {
        $this->checkAuthorization('judicialMember_create');
        $designations = Designation::all();

        return view('judicialcommittee::admin.judicial_member.create', compact('designations'));
    }

    public function store(StoreJudicialMemberRequest $request)
    {
        $this->checkAuthorization('judicialMember_create');

        JudicialMember::create($request->validated());

        toast('न्यायिक समिति विवरण सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(JudicialMember $judicialMember)
    {
        $this->checkAuthorization('judicialMember_access');

        return view('judicialcommittee::show');
    }

    public function edit(JudicialMember $judicialMember)
    {
        $this->checkAuthorization('judicialMember_edit');

        $designations = Designation::all();

        return view('judicialcommittee::admin.judicial_member.edit', compact('judicialMember', 'designations'));
    }

    public function update(UpdateJudicialMemberRequest $request, JudicialMember $judicialMember)
    {
        $this->checkAuthorization('judicialMember_edit');

        if ($request->hasFile('photo') && $judicialMember->photo) {
            $this->deleteFile($judicialMember->photo);
        }
        $judicialMember->update($request->validated());

        toast('न्यायिक समिति विवरण सफलतापूर्वक अपडेट गरियो', 'success');

        return redirect(route('admin.judicialCommittee.judicialMember.index'));
    }

    public function destroy(JudicialMember $judicialMember)
    {
        $this->checkAuthorization('judicialMember_delete');

        if ($judicialMember->photo) {
            $this->deleteFile($judicialMember->photo);
        }
        $judicialMember->delete();

        toast('न्यायिक समितिको विवरण सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }

    public function updateStatus(JudicialMember $judicialMember)
    {
        $this->checkAuthorization('judicialMember_edit');

        $judicialMember->update([
            'status' => ! $judicialMember->status,
        ]);

        toast('न्यायिक सदस्य स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
