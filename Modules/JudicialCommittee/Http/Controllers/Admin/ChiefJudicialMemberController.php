<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Designation;
use Illuminate\Support\Facades\Gate;
use Modules\JudicialCommittee\Entities\ChiefJudicialMember;
use Modules\JudicialCommittee\Http\Requests\ChiefJudicialMemeber\StoreChiefJudicialMemeberRequest;
use Modules\JudicialCommittee\Http\Requests\ChiefJudicialMemeber\UpdateChiefJudicialMemberRequest;

class ChiefJudicialMemberController extends Controller
{
    public function index()
    {
        abort_if(
            Gate::denies('chiefJudicialMember_access'),
            403,
            'You are not allowed to access this resource'
        );
        $chiefJudicialMembers = ChiefJudicialMember::with('designation')->orderBy('position')->get();

        return view('judicialcommittee::admin.chief_member.index', compact('chiefJudicialMembers'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('chiefJudicialMember_create'),
            403,
            'You are not allowed to access this resource'
        );
        $designations = Designation::all();

        return view('judicialcommittee::admin.chief_member.create', compact('designations'));
    }

    public function store(StoreChiefJudicialMemeberRequest $request)
    {
        abort_if(
            Gate::denies('chiefJudicialMember_create'),
            403,
            'You are not allowed to access this resource'
        );
        ChiefJudicialMember::create($request->validated());

        toast('मुख्य न्यायिक सदस्य सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(ChiefJudicialMember $chiefJudicialMember)
    {
        abort_if(
            Gate::denies('chiefJudicialMember_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('judicialcommittee::show');
    }

    public function edit(ChiefJudicialMember $chiefJudicialMember)
    {
        abort_if(
            Gate::denies('chiefJudicialMember_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $designations = Designation::all();

        return view('judicialcommittee::admin.chief_member.edit', compact('chiefJudicialMember', 'designations'));
    }

    public function update(UpdateChiefJudicialMemberRequest $request, ChiefJudicialMember $chiefJudicialMember)
    {
        abort_if(
            Gate::denies('chiefJudicialMember_edit'),
            403,
            'You are not allowed to access this resource'
        );
        if ($request->hasFile('photo')) {
            $this->deleteFile($chiefJudicialMember->photo);
        }
        $chiefJudicialMember->update($request->validated());
        toast('मुख्य न्यायिक सदस्य सफलतापूर्वक सम्पादन गरियो ', 'success');

        return redirect(route('admin.judicialCommittee.chiefJudicialMember.index'));
    }

    public function destroy(ChiefJudicialMember $chiefJudicialMember)
    {
        abort_if(
            Gate::denies('chiefJudicialMember_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $this->deleteFile($chiefJudicialMember->photo_url);
        $chiefJudicialMember->delete();

        toast('मुख्य न्यायिक सदस्य सफलतापूर्वक हटाइयो', 'success');

        return back();
    }

    public function updateStatus(ChiefJudicialMember $chiefJudicialMember)
    {
        abort_if(
            Gate::denies('chiefJudicialMember_edit'),
            403,
            'you are not able to edit chief judicial member'
        );

        $chiefJudicialMember->update([
            'status' => ! $chiefJudicialMember->status,
        ]);

        toast('मुख्य न्यायिक सदस्य स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return back();
    }
}
