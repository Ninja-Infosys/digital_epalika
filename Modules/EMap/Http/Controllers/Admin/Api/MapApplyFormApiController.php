<?php

namespace Modules\EMap\Http\Controllers\Admin\Api;


use Illuminate\Routing\Controller;
use Modules\EMap\Entities\LandUseArea;
use Modules\EMap\Entities\MapFee;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Http\Requests\MapApplyForm\StoreMapApplyFormRequest;
use Modules\Plan\Transformers\LandUseAreaResource;
use Modules\Plan\Transformers\MapFeeResource;
use Modules\Plan\Transformers\OrganizationResource;
use Modules\Plan\Transformers\SettingResource;
use Modules\Plan\Transformers\StructureTypeResource;

class MapApplyFormApiController extends Controller
{
    public function getMapApplySetting(): array
    {
        return [
            'setting' => SettingResource::make(MapSetting::with('landmeasurement')->first()),
            'organizations' => OrganizationResource::collection(Organization::with('organizationDetail')->get()),
            'mapFees' => MapFeeResource::collection(MapFee::with('unit')->get()),
            'landUseAreas' => LandUseAreaResource::collection(LandUseArea::all()),
            'structureTypes' => StructureTypeResource::collection(StructureType::get()),
            'allDistricts' => get_districts(),
        ];
    }


    public function store(StoreMapApplyFormRequest $request)
    {
    }

}
