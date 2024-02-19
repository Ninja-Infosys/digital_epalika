<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\LocalBodyResource;
use App\Http\Resources\ProvinceResource;
use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function provinces()
    {
        return ProvinceResource::collection(Province::all());
    }

    public function province(Province $province)
    {
        return ProvinceResource::make($province->load('districts'));
    }

    public function districts()
    {
        $districts = District::orderBy('province_id')->get();

        return DistrictResource::collection($districts);
    }

    public function district(District $district)
    {
        return DistrictResource::make($district->load('localBodies'));
    }

    public function localBodies()
    {
        $localBody = LocalBody::selectRaw('id,local_body,local_body_en,district_id,wards')
            ->orderBy('district_id')
            ->get();

        return LocalBodyResource::collection($localBody);
    }

    public function localBody(LocalBody $localBody)
    {
        return LocalBodyResource::make($localBody);
    }
}
