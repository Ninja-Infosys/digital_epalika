<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Models\Settings\OfficeSetting;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\GrantDetail;
use Modules\Grant\Entities\GrantProgram;
use Modules\Grant\Entities\GrantType;
use Modules\Grant\Http\Requests\GrantDetail\StoreGrantDetailRequest;
use Modules\Grant\Http\Requests\GrantDetail\UpdateGrantDetailRequest;

class GrantDetailController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantDetail_access');

        $grantDetails = GrantDetail::with('grantType', 'grantProgram', 'localBody')->latest()->get();
        return view('grant::admin.grant_detail.index', compact('grantDetails'));
    }

    public function create()
    {
        $this->checkAuthorization('grantDetail_create');

        $grantPrograms = GrantProgram::all();
        $grantTypes = GrantType::all();
        return view('grant::admin.grant_detail.create', compact('grantPrograms', 'grantTypes'));
    }

    public function store(StoreGrantDetailRequest $request)
    {
        $this->checkAuthorization('grantDetail_create');

        GrantDetail::create($request->validated());

        toast('अनुदान विवरण सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_access');
        return view('grant::admin.grant_detail.show',compact('grantDetail'));
    }

    public function edit(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_edit');

        $grantPrograms = GrantProgram::all();
        $grantTypes = GrantType::all();
        return view('grant::admin.grant_detail.edit', compact('grantDetail', 'grantPrograms', 'grantTypes'));
    }

    public function update(UpdateGrantDetailRequest $request, GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_edit');

        $grantDetail->update($request->validated());

        toast('अनुदान विवरण सफलतापूर्वक अद्यावधिक गरियो','success');

        return redirect(route('admin.grant.grantDetail.index'));
    }

    public function destroy(GrantDetail $grantDetail)
    {
        $this->checkAuthorization('grantDetail_delete');

        $grantDetail->delete();

        toast('अनुदान विवरण सफलतापूर्वक मेटाइयो','success');
        return back();
    }
}
