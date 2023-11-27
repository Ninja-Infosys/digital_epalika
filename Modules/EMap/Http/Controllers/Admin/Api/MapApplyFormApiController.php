<?php

namespace Modules\EMap\Http\Controllers\Admin\Api;

use App\Http\Controllers\Admin\AddressController;
use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\DigitalBoard\Transformers\OfficeSettingResource;
use Modules\EMap\Entities\HouseOwner;
use Modules\EMap\Entities\LandOwner;
use Modules\EMap\Entities\LandUseArea;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapApplyApi;
use Modules\EMap\Entities\MapApplyApiForm;
use Modules\EMap\Entities\MapApplyFormApi;
use Modules\EMap\Entities\MapFee;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\StoreyDetail;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Enums\TypeOfConstructionWorkEnum;
use Modules\EMap\Http\Requests\MapApplyForm\UpdateMapApplyFormRequest;
use Modules\EMap\Http\Requests\MapApplyForm\StoreMapApplyFormRequest;
use Modules\Plan\Transformers\LandOwnerApiResource;
use Modules\Plan\Transformers\LandUseAreaResource;
use Modules\Plan\Transformers\MapApplyFOrmApiResource;
use Modules\Plan\Transformers\MapFeeResource;
use Modules\Plan\Transformers\OrganizationResource;
use Modules\Plan\Transformers\SettingResource;
use Modules\Plan\Transformers\StructureTypeResource;

class MapApplyFormApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(): array
    {

        $setting = MapSetting::with('landMeasurement')->first() ?? new MapSetting();
        $organizations = Organization::with('userDetail', 'organizationDetail')->get();
        $mapFees = MapFee::with('unit')->get();
        $landUseAreas = LandUseArea::get();
        $officeSetting = OfficeSetting::with('localBody')->first();
        $structureTypes = StructureType::latest()->get();
        $allDistricts = get_districts();

        return [
            'setting' => SettingResource::make(MapSetting::with('landmeasurement')->first()),
            'organizations' => OrganizationResource::make(Organization::with('userDetail')->first()),
            'mapFees' => MapFeeResource::make(MapFee::with('unit')->get()),
            'landUseAreas' => LandUseAreaResource::collection(LandUseArea::all()),
            'officeSetting' => OfficeSettingResource::make(OfficeSetting::with('localbody')->first()),
            'structureTypes' => StructureTypeResource::collection(StructureType::get()),
            'allDistricts' => $allDistricts,
        ];
    }


    public function store(StoreMapApplyFormRequest $request)
    { 
    }


    public function show(MapApply $mapApply)
    {

    }
    public function update(UpdateMapApplyFormRequest $request, MapApply $mapApply)
{

}



    public function destroy(MapApply $mapApply)
    {


    }
}
