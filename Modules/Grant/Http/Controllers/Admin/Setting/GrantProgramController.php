<?php

namespace Modules\Grant\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Http\Requests\GrantProgram\StoreGrantProgramRequest;
use Modules\Grant\Http\Requests\GrantProgram\UpdateGrantProgramRequest;

class GrantProgramController extends Controller
{
    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('grantProgram_access');
        $grantPrograms = GrantProgram::latest()->get();
        return view('grant::admin.setting.grantProgram.index', compact('grantPrograms'));
    }

    public function create(): Factory|View|Application
    {
        $this->checkAuthorization('grantProgram_create');

        return view('grant::admin.setting.grantProgram.create');
    }

    public function store(StoreGrantProgramRequest $request): RedirectResponse
    {
        $this->checkAuthorization('grantProgram_create');

        GrantProgram::create($request->validated());
        toast('Grant Program Added Succesfully !!', 'success');
        return back();
    }


    public function edit(GrantProgram $grantProgram)
    {
        $this->checkAuthorization('grantProgram_edit');

        return view('grant::admin.setting.grantProgram.edit', compact('grantProgram'));
    }

    public function update(UpdateGrantProgramRequest $request, GrantProgram $grantProgram)
    {
        $this->checkAuthorization('grantProgram_edit');

        $grantProgram->update($request->validated());
        toast('Grant Program  updated Successfully', 'success');
        return redirect(route('admin.grant.setting.grantProgram.index'));

    }

    public function destroy(GrantProgram $grantProgram)
    {
        $this->checkAuthorization('grantProgram_delete');
        $grantProgram->delete();
        toast('Grant Program deleted Successfully', 'success');
        return back();

    }
}
