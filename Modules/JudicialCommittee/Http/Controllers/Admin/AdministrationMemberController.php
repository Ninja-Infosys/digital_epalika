<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Designation;
use Modules\JudicialCommittee\Entities\AdministrationMember;
use Modules\JudicialCommittee\Http\Requests\AdministrationMember\StoreAdministrationMamberRequest;
use Modules\JudicialCommittee\Http\Requests\AdministrationMember\UpdateAdministrationMemberRequest;

class AdministrationMemberController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('administrationMember_access');
        $administrationMembers = AdministrationMember::with('designation')->orderBy('position')->get();

        return view('judicialcommittee::admin.administration_member.index', compact('administrationMembers'));
    }

    public function create()
    {
        $this->checkAuthorization('administrationMember_create');

        $designations = Designation::all();

        return view('judicialcommittee::admin.administration_member.create', compact('designations'));
    }

    public function store(StoreAdministrationMamberRequest $request)
    {
        $this->checkAuthorization('administrationMember_create');
        AdministrationMember::create($request->validated());

        toast('प्रशासन सदस्य सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show($id)
    {
        $this->checkAuthorization('administrationMember_access');

        return view('judicialcommittee::show');
    }

    public function edit(AdministrationMember $administrationMember)
    {
        $this->checkAuthorization('administrationMember_edit');

        $designations = Designation::all();

        return view('judicialcommittee::admin.administration_member.edit', compact('administrationMember', 'designations'));
    }

    public function update(UpdateAdministrationMemberRequest $request, AdministrationMember $administrationMember)
    {
        $this->checkAuthorization('administrationMember_edit');

        if ($request->hasFile('photo')) {
            $this->deleteFile($administrationMember->photo_url);
        }
        if ($request->hasFile('red_signature')) {
            $this->deleteFile($administrationMember->red_signature_url);
        }
        if ($request->hasFile('black_signature')) {
            $this->deleteFile($administrationMember->black_signature_url);
        }

        $administrationMember->update($request->validated());

        toast('प्रशासन सदस्य सफलतापूर्वक सम्पादन गरियो', 'success');

        return redirect(route('admin.judicialCommittee.administrationMember.index'));
    }

    public function destroy(AdministrationMember $administrationMember)
    {
        $this->checkAuthorization('administrationMember_delete');
        $this->deleteFile($administrationMember->photo_url);
        $this->deleteFile($administrationMember->red_signature_url);
        $this->deleteFile($administrationMember->black_signature_url);
        $administrationMember->delete();

        toast('प्रशासन सदस्य सफलतापूर्वक हटाइयो', 'success');

        return back();
    }

    public function updateStatus(AdministrationMember $administrationMember)
    {
        $this->checkAuthorization('administrationMember_edit');

        $administrationMember->update([
            'status' => ! $administrationMember->status,
        ]);

        toast('प्रशासन सदस्य स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
