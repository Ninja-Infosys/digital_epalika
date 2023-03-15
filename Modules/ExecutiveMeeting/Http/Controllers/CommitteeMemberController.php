<?php

namespace Modules\ExecutiveMeeting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\ExecutiveMeeting\Entities\Committee;
use Modules\ExecutiveMeeting\Entities\CommitteeMember;
use Modules\ExecutiveMeeting\Http\Requests\CommitteeMember\StoreCommitteeMemberRequest;
use Modules\ExecutiveMeeting\Http\Requests\CommitteeMember\UpdateCommitteeMemberRequest;

class CommitteeMemberController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('committeeMember_access');
        $committeeMembers = CommitteeMember::paginate(10);
        return view('executivemeeting::admin.committeeMember.index', compact('committeeMembers'));
    }

    public function create()
    {
        $this->checkAuthorization('committeeMember_create');
        $committees = Committee::all();
        return view('executivemeeting::admin.committeeMember.create',compact('committees'));
    }

    public function store(StoreCommitteeMemberRequest $request)
    {
        $this->checkAuthorization('committeeMember_create');
        CommitteeMember::create($request->validated() + [
                'user_id' => auth()->id()
            ]);
        toast('Committee member added successfully', 'success');
        return back();
    }

    public function show(CommitteeMember $committeeMember)
    {
        $this->checkAuthorization('committeeMember_access');
        return view('executivemeeting::show');
    }

    public function edit(CommitteeMember $committeeMember)
    {
        $this->checkAuthorization('committeeMember_edit');
        $committees = Committee::all();
        return view('executivemeeting::admin.committeeMember.edit', compact('committeeMember','committees'));
    }

    public function update(UpdateCommitteeMemberRequest $request, CommitteeMember $committeeMember)
    {
        $this->checkAuthorization('committeeMember_edit');
        $request->update($request->validated());
        toast('Committee member updated successfully', 'success');
        return redirect(route('admin.executiveMeeting.CommitteeMember.index'));
    }

    public function destroy(CommitteeMember $committeeMember)
    {
        $this->checkAuthorization('committeeMember_delete');
        $committeeMember->delete();
        toast('Committee member deleted successfully', 'success');
        return back();
    }
}
