<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapRegistration;

class MapRegistrationController extends Controller
{

    public function create(MapApply $mapApply)
    {
        $mapApply->load('storeyDetails', 'storeyDetails.mapFee');
        return view('emap::admin.map.map-registration.create', compact('mapApply'));
    }

    public function store(Request $request, MapApply $mapApply)
    {
        //
    }

    public function show(MapApply $mapApply, MapRegistration $mapRegistration)
    {
        return view('emap::show');
    }

    public function edit(MapApply $mapApply, MapRegistration $mapRegistration)
    {
        return view('emap::edit');
    }

    public function update(Request $request, MapApply $mapApply, MapRegistration $mapRegistration)
    {
        //
    }

    public function destroy(MapApply $mapApply, MapRegistration $mapRegistration)
    {
        //
    }
}
