<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use App\Models\Settings\Designation;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\JudicialCommittee\Entities\AdministrationMember;
use Modules\JudicialCommittee\Entities\JudicialMember;
use Modules\JudicialCommittee\Http\Requests\JudicialMember\StoreJudicialMemberRequest;
use Modules\JudicialCommittee\Http\Requests\JudicialMember\UpdateJudicialMemberRequest;

class JudicialMemberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('judicialMember_access'),
            403,
            'You are not allowed to access this resource'
        );

        $judicialMembers=JudicialMember::with('designation','province','district','localBody')->orderBy('position')->get();

        return view('judicialcommittee::admin.judicial_member.index',compact('judicialMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('judicialMember_create'),
            403,
            'You are not allowed to access this resource'
        );
        $designations=Designation::all();

        return view('judicialcommittee::admin.judicial_member.create',compact('designations'));
    }

    public function store(StoreJudicialMemberRequest $request)
    {
        abort_if(Gate::denies('judicialMember_create'),
            403,
            'You are not allowed to access this resource'
        );

        JudicialMember::create($request->validated());

        toast('न्यायिक समिति विवरण सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show(JudicialMember $judicialMember)
    {
        abort_if(Gate::denies('judicialMember_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('judicialcommittee::show');
    }

    public function edit(JudicialMember $judicialMember)
    {
        abort_if(Gate::denies('judicialMember_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $designations=Designation::all();

        return view('judicialcommittee::admin.judicial_member.edit',compact('judicialMember','designations'));
    }

    public function update(UpdateJudicialMemberRequest $request, JudicialMember $judicialMember)
    {
        abort_if(Gate::denies('judicialMember_edit'),
            403,
            'You are not allowed to access this resource'
        );

        if($request->hasFile('photo') && $judicialMember->photo){
            $this->deleteFile($judicialMember->photo);
        }
        $judicialMember->update($request->validated());

        toast('न्यायिक समिति विवरण सफलतापूर्वक अपडेट गरियो','success');
        return redirect(route('admin.judicialCommittee.judicialMember.index'));
    }

    public function destroy(JudicialMember $judicialMember)
    {
        abort_if(Gate::denies('judicialMember_delete'),
            403,
            'You are not allowed to access this resource'
        );

        if($judicialMember->photo){
            $this->deleteFile($judicialMember->photo);
        }
        $judicialMember->delete();

        toast('न्यायिक समितिको विवरण सफलतापूर्वक मेटाइयो','success');
        return back();
    }

    public function updateStatus(JudicialMember $judicialMember)
    {
        abort_if(Gate::denies('judicialMember_edit'),
            403,
            'you are not able to edit this resource'
        );

        $judicialMember->update([
            'status' => !$judicialMember->status
        ]);

        toast('न्यायिक सदस्य स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
}
