<?php

namespace Modules\Grant\Http\Controllers\Admin\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Grant\Entities\EnterpriseType;
use Modules\Grant\Http\Requests\Setting\EnterpriseType\StoreEnterpriseTypeRequest;
use Modules\Grant\Http\Requests\Setting\EnterpriseType\UpdateEnterpriseTypeRequest;

class EnterpriseTypeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('enterpriseType_access');

        $types = EnterpriseType::all();
        return view('grant::admin.setting.enterpriseType.index', compact('types'));
    }

    public function create()
    {
        $this->checkAuthorization('enterpriseType_create');
        return view('grant::admin.setting.enterpriseType.create');
    }

    public function store(StoreEnterpriseTypeRequest $request)
    {
        $this->checkAuthorization('enterpriseType_create');

        EnterpriseType::create($request->validated());
        toast('उद्यम प्रकार सफलतापूर्वक भण्डारण गरियो', 'success');
        return back();

    }

    public function show($id)
    {
        return view('grant::show');
    }

    public function edit(EnterpriseType $enterpriseType)
    {
        $this->checkAuthorization('enterpriseType_edit');
        return view('grant::admin.setting.enterpriseType.edit', compact('enterpriseType'));
    }

    public function update(updateEnterpriseTypeRequest $request, EnterpriseType $enterpriseType)
    {
        $this->checkAuthorization('enterpriseType_edit');

        $enterpriseType->update($request->validated());

        toast('उद्यम प्रकार सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('admin.grant.setting.enterpriseType.index'));
    }

    public function destroy(EnterpriseType $enterpriseType)
    {
        $this->checkAuthorization('enterpriseType_delete');

        $enterpriseType->delete();

        toast('उद्यम प्रकार सफलतापूर्वक मेटाइयो', 'success');
        return back();
    }
}
