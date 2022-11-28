<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\FiscalYear;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Http\Requests\GrantProgram\StoreGrantProgramRequest;
use Modules\Grant\Http\Requests\GrantProgram\UpdateGrantProgramRequest;

class GrantProgramController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantProgram_access');

        $grantPrograms = GrantProgram::with('fiscalYear')->latest()->paginate(10);

        return view('grant::admin.grant_program.index', compact('grantPrograms'));
    }

    public function create()
    {
        $this->checkAuthorization('grantProgram_create');

        $fiscalYears = FiscalYear::all();

        return view('grant::admin.grant_program.create', compact('fiscalYears'));
    }

    public function store(StoreGrantProgramRequest $request)
    {
        $this->checkAuthorization('grantProgram_create');

        GrantProgram::create($request->validated());

        toast('कार्यक्रम सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(GrantProgram $grantProgram)
    {
        $this->checkAuthorization('grantProgram_access');

        return view('grant::show');
    }

    public function edit(GrantProgram $grantProgram)
    {
        $this->checkAuthorization('grantProgram_edit');
        $fiscalYears = FiscalYear::all();

        return view('grant::admin.grant_program.edit', compact('fiscalYears', 'grantProgram'));
    }

    public function update(UpdateGrantProgramRequest $request, GrantProgram $grantProgram)
    {
        $this->checkAuthorization('grantProgram_edit');

        $grantProgram->update($request->validated());

        toast('कार्यक्रम सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.grant.grantProgram.index'));
    }

    public function destroy(GrantProgram $grantProgram)
    {
        $this->checkAuthorization('grantProgram_delete');

        $grantProgram->delete();

        toast('कार्यक्रम सफलतापूर्वक हटाइयो', 'success');

        return back();
    }
}
