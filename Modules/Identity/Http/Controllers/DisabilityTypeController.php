<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\DisabilityType;
use Modules\Identity\Http\Requests\DisabilityType\StoreDisabilityTypeRequest;
use Modules\Identity\Http\Requests\DisabilityType\UpdateDisabilityTypeRequest;

class DisabilityTypeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('disabilityType_access');
        $disabilityTypes = DisabilityType::latest()->paginate(10);
        return view('identity::admin.setting.disabilityType.index',compact('disabilityTypes'));
    }

    public function create()
    {
        $this->checkAuthorization('disabilityType_create');
        return view('identity::admin.setting.disabilityType.create');
    }

    public function store(StoreDisabilityTypeRequest $request)
    {
        $this->checkAuthorization('disabilityType_create');
        DisabilityType::create($request->validated());
        toast('अपांगताको प्रकार सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function show(DisabilityType $disabilityType)
    {
        $this->checkAuthorization('disabilityType_access');
        return view('identity::show');
    }

    public function edit(DisabilityType $disabilityType)
    {
        $this->checkAuthorization('disabilityType_edit');
        return view('identity::admin.setting.disabilityType.edit',compact('disabilityType'));
    }

    public function update(UpdateDisabilityTypeRequest $request, DisabilityType $disabilityType)
    {

        $this->checkAuthorization('disabilityType_edit');
        $disabilityType->update($request->validated());

        toast('अपांगताको प्रकार सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return redirect(route('identity.admin.setting.disabilityType.index'));
    }

    public function destroy(DisabilityType $disabilityType)
    {
        $this->checkAuthorization('disabilityType_delete');
        $disabilityType->delete();
        toast('अपांगताको प्रकार सफलतापूर्वक मेटियो', 'success');
        return back();
    }
}
