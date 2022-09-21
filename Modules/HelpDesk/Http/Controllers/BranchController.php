<?php

namespace Modules\HelpDesk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\HelpDesk\Entities\Branch;

class BranchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('branch_access'),
            403,
            'You are not allowed to access this resource'
        );

        $branches = Branch::with('branch')->get();

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

    public function store(Request $request)
    {
        abort_if(Gate::denies('branch_create'),
            403,
            'You are not allowed to access this resource'
        );
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

        return view('helpdesk::edit');
    }

    public function update(Request $request, Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'),
            403,
            'You are not allowed to access this resource'
        );
    }
}
