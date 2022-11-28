<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Modules\Grant\Entities\GrantDetail;

class GrantDetailController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantDetail_access');

        $grantDetails = GrantDetail::with('fiscalYear', 'grantType', 'grantProgram')->latest()->get();

        return view('grant::admin.grant_detail.index', compact('grantDetails'));
    }

    public function create()
    {
        $this->checkAuthorization('grantDetail_create');

        return view('grant::admin.grant_detail.create');
    }

    public function store(Request $request)
    {
        $this->checkAuthorization('grantDetail_create');
    }

    public function show(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_access');

        return view('grant::show');
    }

    public function edit(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_edit');

        return view('grant::admin.grant_detail.edit', compact('grantDetail'));
    }

    public function update(Request $request, GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_edit');
    }

    public function destroy(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_delete');

        $grantDetail->delete();

        toast('अनुदान विवरण सफलतापूर्वक मेटाइयो', 'success');

        return back();
    }
}
