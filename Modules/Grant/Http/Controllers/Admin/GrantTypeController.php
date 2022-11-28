<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Http\Requests\GrantType\StoreGrantTypeRequest;
use Modules\Grant\Http\Requests\GrantType\UpdateGrantTypeRequest;

class GrantTypeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantType_access');

        $grantTypes = GrantType::all();

        return view('grant::admin.grant_type.index', compact('grantTypes'));
    }

    public function create()
    {
        $this->checkAuthorization('grantType_create');

        return view('grant::admin.grant_type.create');
    }

    public function store(StoreGrantTypeRequest $request)
    {
        $this->checkAuthorization('grantType_create');
        GrantType::create($request->validated());

        toast('अनुदान प्रकार सफलतापूर्वक थपियो', 'success');

        return back();
    }

    public function show(GrantType $grantType)
    {
        return view('grant::show');
    }

    public function edit(GrantType $grantType)
    {
        $this->checkAuthorization('grantType_edit');

        return view('grant::admin.grant_type.edit', compact('grantType'));
    }

    public function update(UpdateGrantTypeRequest $request, GrantType $grantType)
    {
        $this->checkAuthorization('grantType_edit');
        $grantType->update($request->validated());

        toast('अनुदान प्रकार सफलतापूर्वक अद्यावधिक गरियो', 'success');

        return redirect(route('admin.grant.grantType.index'));
    }

    public function destroy(GrantType $grantType)
    {
        $this->checkAuthorization('grantType_delete');
        $grantType->delete();

        toast('अनुदान प्रकार सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
