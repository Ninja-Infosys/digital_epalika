<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Http\Requests\GrantType\StoreGrantTypeRequest;
use Modules\Grant\Http\Requests\GrantType\UpdateGrantTypeRequest;

class GrantTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grantType_access'),
            403,
            'You are not allowed to access this resource'
        );

        $grantTypes=GrantType::all();

        return view('grant::admin.grant_type.index', compact('grantTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('grantType_create'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grant::admin.grant_type.create');
    }

    public function store(StoreGrantTypeRequest $request)
    {
        abort_if(Gate::denies('grantType_create'),
            403,
            'You are not allowed to access this resource'
        );
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
        abort_if(Gate::denies('grantType_edit'),
            403,
            'You are not allowed to access this resource'
        );
        return view('grant::admin.grant_type.edit', compact('grantType'));
    }

    public function update(UpdateGrantTypeRequest $request, GrantType $grantType)
    {
        abort_if(Gate::denies('grantType_edit'),
        403,
        'You are not allowed to edit this resource'
    );
        $grantType->update($request->validated());

        toast('अनुदान प्रकार सफलतापूर्वक अद्यावधिक गरियो','success');
        return redirect(route('admin.grant.grantType.index'));
    }

    public function destroy(GrantType $grantType)
    {
        abort_if(Gate::denies('grantType_delete'),
        403,
        'you are not allowed to delete this resource');
        $grantType->delete();

        toast('अनुदान प्रकार सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
