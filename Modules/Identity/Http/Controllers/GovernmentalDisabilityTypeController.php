<?php

namespace Modules\Identity\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Identity\Entities\DisabilityReason;
use Modules\Identity\Entities\GovernmentalDisabilityType;
use Modules\Identity\Http\Requests\StoreGovernmentalDisablityRequest;
use Modules\Identity\Http\Requests\UpdateGovernmentalDisablityRequest;

class GovernmentalDisabilityTypeController extends Controller
{
    public function index()
    {
        $this->checkAuthorization('governmentalDisabilityType_access');
        $governmentalDisability = GovernmentalDisabilityType::latest()->paginate(10);
        return view('identity::admin.setting.governmentalDisabilityType.index',compact('governmentalDisability'));
    }

    public function create()
    {
        return view('identity::admin.setting.governmentalDisabilityType.create');
    }

    public function store(StoreGovernmentalDisablityRequest $request)
    {
        //
    }

    public function show($id)
    {
        return view('identity::show');
    }

    public function edit($id)
    {
        return view('identity::edit');
    }

    public function update(UpdateGovernmentalDisablityRequest $request, $id)
    {
        return view('identity::admin.setting.governmentalDisabilityType.edit');
    }

    public function destroy($id)
    {
        //
    }
}
