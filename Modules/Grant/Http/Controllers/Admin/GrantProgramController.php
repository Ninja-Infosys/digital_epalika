<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Models\Settings\FiscalYear;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Http\Requests\GrantProgram\StoreGrantProgramRequest;
use Modules\Grant\Http\Requests\GrantProgram\UpdateGrantProgramRequest;

class GrantProgramController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grantProgram_access'),
            403,
            'You are not allowed to access this resource'
        );

        $grantPrograms = GrantProgram::with('fiscalYear')->latest()->get();

        return view('grant::admin.grant_program.index', compact('grantPrograms'));
    }

    public function create()
    {
        abort_if(Gate::denies('grantProgram_create'),
            403,
            'You are not allowed to access this resource'
        );

        $fiscalYears = FiscalYear::all();

        return view('grant::admin.grant_program.create', compact('fiscalYears'));
    }

    public function store(StoreGrantProgramRequest $request)
    {
        abort_if(Gate::denies('grantProgram_create'),
            403,
            'You are not allowed to access this resource'
        );

        GrantProgram::create($request->validated());

        toast('कार्यक्रम सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(GrantProgram $grantProgram)
    {
        abort_if(Gate::denies('grantProgram_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::show');
    }

    public function edit(GrantProgram $grantProgram)
    {
        abort_if(Gate::denies('grantProgram_edit'),
            403,
            'You are not allowed to access this resource'
        );
        $fiscalYears = FiscalYear::all();

        return view('grant::admin.grant_program.edit',compact('fiscalYears','grantProgram'));
    }

    public function update(UpdateGrantProgramRequest $request, GrantProgram $grantProgram)
    {
        abort_if(Gate::denies('grantProgram_edit'),
            403,
            'You are not allowed to access this resource'
        );

        $grantProgram->update($request->validated());

        toast('कार्यक्रम सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grant.grantProgram.index'));
    }

    public function destroy(GrantProgram $grantProgram)
    {
        abort_if(Gate::denies('grantProgram_delete'),
            403,
            'You are not allowed to access this resource'
        );

        $grantProgram->delete();

        toast('कार्यक्रम सफलतापूर्वक हटाइयो', 'success');
        return back();
    }
}
