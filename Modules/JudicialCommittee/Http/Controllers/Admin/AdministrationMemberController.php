<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Models\Settings\Designation;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\JudicialCommittee\Entities\AdministrationMember;
use Modules\JudicialCommittee\Entities\ChiefJudicialMember;
use Modules\JudicialCommittee\Http\Requests\AdministrationMember\StoreAdministrationMamberRequest;
use Modules\JudicialCommittee\Http\Requests\AdministrationMember\UpdateAdministrationMemberRequest;

class AdministrationMemberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('administrationMember_access'),
            403,
            'You are not allowed to access this resource'
        );
        $administrationMembers = AdministrationMember::with('designation')->orderBy('position')->get();
        return view('judicialcommittee::admin.administration_member.index', compact('administrationMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('administrationMember_create'),
            403,
            'You are not allowed to access this resource'
        );

        $designations = Designation::all();
        return view('judicialcommittee::admin.administration_member.create', compact('designations'));
    }

    public function store(StoreAdministrationMamberRequest $request)
    {
        abort_if(Gate::denies('administrationMember_create'),
            403,
            'You are not allowed to access this resource'
        );
        AdministrationMember::create($request->validated());

        toast('प्रशासन सदस्य सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show($id)
    {
        abort_if(Gate::denies('administrationMember_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('judicialcommittee::show');
    }

    public function edit(AdministrationMember $administrationMember)
    {
        abort_if(Gate::denies('administrationMember_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $designations = Designation::all();
        return view('judicialcommittee::admin.administration_member.edit', compact('administrationMember', 'designations'));
    }

    public function update(UpdateAdministrationMemberRequest $request, AdministrationMember $administrationMember)
    {
        abort_if(Gate::denies('administrationMember_edit'),
            403,
            'You are not allowed to access this resource'
        );

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
        abort_if(Gate::denies('administrationMember_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $this->deleteFile($administrationMember->photo_url);
        $this->deleteFile($administrationMember->red_signature_url);
        $this->deleteFile($administrationMember->black_signature_url);
        $administrationMember->delete();

        toast('प्रशासन सदस्य सफलतापूर्वक हटाइयो', 'success');
        return back();
    }

    public function updateStatus(AdministrationMember $administrationMember)
    {
        abort_if(Gate::denies('administrationMember_edit'),
            403,
            'you are not able to edit this resource'
        );

        $administrationMember->update([
            'is_active' => !$administrationMember->is_active
        ]);

        toast('प्रशासन सदस्य स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
