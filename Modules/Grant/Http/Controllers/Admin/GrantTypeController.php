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

        return view('grant::index');
    }

    public function create()
    {
        return view('grant::create');
    }

    public function store(StoreGrantTypeRequest $request)
    {
        //
    }

    public function show(GrantType $grantType)
    {
        return view('grant::show');
    }

    public function edit(GrantType $grantType)
    {
        return view('grant::edit');
    }

    public function update(UpdateGrantTypeRequest $request, GrantType $grantType)
    {
        //
    }

    public function destroy(GrantType $grantType)
    {
        //
    }
}
