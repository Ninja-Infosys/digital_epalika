<?php

namespace Modules\Grant\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Http\Requests\GrantType\StoreGrantTypeRequest;
use Modules\Grant\Http\Requests\GrantType\UpdateGrantTypeRequest;

class GrantTypeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('grantType_access');
        $grantTypes = GrantType::latest()->get();
        return view('grant::admin.setting.grantType.index', compact('grantTypes'));
    }

    public function create(): Factory|View|Application
    {
        $this->checkAuthorization('grantType_create');

        return view('grant::admin.setting.grantType.create');
    }

    public function store(StoreGrantTypeRequest $request): RedirectResponse
    {
        $this->checkAuthorization('grantType_create');

        GrantType::create($request->validated());
        toast('Grant Type Added Successfully', 'success');
        return back();

    }

    public function edit(GrantType $grantType)
    {
        $this->checkAuthorization('grantType_edit');

        return view('grant::admin.setting.grantType.edit',compact('grantType'));
    }

    public function update(UpdateGrantTypeRequest $request, GrantType $grantType)
    {
        $this->checkAuthorization('grantType_edit');

        $grantType->update($request->validated());
        toast('Grant Type updated Successfully', 'success');
        return redirect(route('admin.grant.setting.grantType.index'));
    }

    public function destroy(GrantType $grantType)
    {
        $this->checkAuthorization('grantType_delete');
        $grantType->delete();

        toast('Grant Type deleted Successfully', 'success');
        return back();

    }
}
