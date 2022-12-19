<?php

namespace Modules\Grant\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\GrantOffice;
use Modules\Grant\Http\Requests\Setting\GrantOffice\StoreGrantOfficeRequest;
use Modules\Grant\Http\Requests\Setting\GrantOffice\UpdateGrantOfficeRequest;

class GrantOfficeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('grantOffice_access');

        $offices=GrantOffice::all();
        return view('grant::admin.setting.grantOffice.index',compact('offices'));
    }

    public function create()
    {
        $this->checkAuthorization('grantOffice_create');
        return view('grant::admin.setting.grantOffice.create');
    }

    public function store(StoreGrantOfficeRequest $request)
    {
        $this->checkAuthorization('grantOffice_create');

        GrantOffice::create($request->validated());

        toast('अनुदान कार्यालय सफलतापूर्वक थपियो','success');
        return back();
    }

    public function show($id)
    {
        return view('grant::show');
    }

    public function edit(GrantOffice $grantOffice)
    {
        $this->checkAuthorization('grantOffice_edit');
        return view('grant::admin.setting.grantOffice.edit', compact('grantOffice'));
    }

    public function update(UpdateGrantOfficeRequest $request, GrantOffice $grantOffice)
    {
        $this->checkAuthorization('grantOffice_edit');

        $grantOffice->update($request->validated());

        toast('अनुदान कार्यालय सफलतापूर्वक अद्यावधिक गरियो','success');
        return redirect(route('admin.grant.setting.grantOffice.index'));
    }

    public function destroy(GrantOffice $grantOffice)
    {
        $this->checkAuthorization('grantOffice_delete');

        $grantOffice->delete();
        toast('अनुदान कार्यालय सफलतापूर्वक हटाइयो','success');

        return back();
    }
}
