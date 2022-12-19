<?php

namespace Modules\Grant\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Factory;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Modules\Grant\Entities\CooperativeType;
use Modules\Grant\Http\Requests\CooperativeType\StoreCooperativeTypeRequest;

class CooperativeTypeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $this->checkAuthorization('cooperativeType_access');
       $cooperativeTypes = CooperativeType::latest()->get();
        return view('grant::admin.setting.cooperativeType.index', compact('cooperativeTypes'));
    }

    public function create(): Factory|View|Application
    {
        $this->checkAuthorization('cooperativeType_create');
        return view('grant::admin.setting.cooperativeType.create');
    }

    public function store(StoreCooperativeTypeRequest $request): RedirectResponse
    {
        $this->checkAuthorization('cooperative_create');
        CooperativeType::create($request->validated());
        toast('Cooperative Type Added Successfully', 'success');
        return back();

    }

    public function edit(CooperativeType $cooperativeType)
    {
        $this->checkAuthorization('cooperativeType_edit');
        return view('grant::admin.setting.cooperativeType.edit', compact('cooperativeType'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
