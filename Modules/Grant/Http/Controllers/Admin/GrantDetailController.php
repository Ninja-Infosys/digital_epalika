<?php

namespace Modules\Grant\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantDetail;

class GrantDetailController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grantDetail_access'),
            403,
            'You are not allowed to access this resource'
        );

        $grantDetails=GrantDetail::with('fiscalYear','grantType','grantProgram')->latest()->get();

        return view('grant::admin.grant_detail.index',compact('grantDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('grantDetail_create'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::admin.grant_detail.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('grantDetail_create'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function show(GrantDetail $grantDetail)
    {
        abort_if(Gate::denies('grantDetail_access'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::show');
    }

    public function edit(GrantDetail $grantDetail)
    {
        abort_if(Gate::denies('grantDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );

        return view('grant::admin.grant_detail.edit',compact('grantDetail'));
    }

    public function update(Request $request, GrantDetail $grantDetail)
    {
        abort_if(Gate::denies('grantDetail_edit'),
            403,
            'You are not allowed to access this resource'
        );
    }

    public function destroy(GrantDetail $grantDetail)
    {
        abort_if(Gate::denies('grantDetail_delete'),
            403,
            'You are not allowed to access this resource'
        );

        $grantDetail->delete();

        toast('अनुदान विवरण सफलतापूर्वक मेटाइयो','success');
        return back();
    }
}
