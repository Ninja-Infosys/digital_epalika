<?php

namespace Modules\HelpDesk\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\HelpDesk\Entities\Branch;
use Modules\HelpDesk\Http\Requests\Branch\StoreBranchRequest;
use Modules\HelpDesk\Http\Requests\Branch\UpdateBranchRequest;

class BranchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('branch_access'),
            403,
            'You are not allowed to access this resource'
        );

        $branches = Branch::with('branches.branch')->whereNull('branch_id')->orderBy('branch_id')->get();

        return view('helpdesk::admin.branch.index', compact('branches'));
    }

    public function create()
    {
        abort_if(Gate::denies('branch_create'),
            403,
            'You are not allowed to access this resource'
        );

        $mainBranches = Branch::whereNull('branch_id')->get();

        return view('helpdesk::admin.branch.create', compact('mainBranches'));
    }

    public function store(StoreBranchRequest $request)
    {
        abort_if(Gate::denies('branch_create'),
            403,
            'You are not allowed to access this resource'
        );
        Branch::create($request->validated());

        toast('शाखा सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(Branch $branch)
    {
        abort_if(Gate::denies('branch_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('helpdesk::admin.branch.show');
    }

    public function edit(Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $mainBranches = Branch::whereNull('branch_id')->get();

        return view('helpdesk::admin.branch.edit', compact('branch', 'mainBranches'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $branch->update($request->validated());

        toast('शाखा सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.helpDesk.branch.index'));
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'),
            403,
            'You are not allowed to access this resource'
        );
        $branch->branches()->delete();
        $branch->delete();

        toast('शाखा सफलतापूर्वक हटाइयो', 'success');
        return back();
    }
}
