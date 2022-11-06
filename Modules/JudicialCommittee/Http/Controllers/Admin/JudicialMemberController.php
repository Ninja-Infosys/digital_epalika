<?php

namespace Modules\JudicialCommittee\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\JudicialCommittee\Entities\JudicialMember;
use Modules\JudicialCommittee\Http\Requests\JudicialMember\StoreJudicialMemberRequest;

class JudicialMemberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('judicialMember_access'),
            403,
            'You are not allowed to access this resource'
        );

        $judicialMembers=JudicialMember::with('designation')->orderBy('position')->get();

        return view('judicialcommittee::admin.judicial_member.index');
    }

    public function create()
    {
        abort_if(Gate::denies('judicialMember_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('judicialcommittee::admin.judicial_member.create');
    }

    public function store(StoreJudicialMemberRequest $request)
    {
        abort_if(Gate::denies('judicialMember_create'),
            403,
            'You are not allowed to access this resource'
        );
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

        return view('judicialcommittee::edit');
    }

    public function update(Request $request, JudicialMember $judicialMember)
    {
        abort_if(Gate::denies('judicialMember_edit'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('judicialMember_delete'),
            403,
            'You are not allowed to access this resource'
        );
    }
}
