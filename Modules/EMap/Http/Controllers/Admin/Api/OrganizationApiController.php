<?php

namespace Modules\EMap\Http\Controllers\Admin\Api;

use App\Models\Settings\OfficeSetting;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\EMap\Entities\LandUseArea;
use Modules\EMap\Entities\MapFee;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\StructureType;
use Modules\Plan\Transformers\OrganizationResource;
use Modules\Plan\Transformers\SettingResource;


class OrganizationApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $setting = MapSetting::with('landMeasurement')->first() ?? new MapSetting();
    $organizations = Organization::with('userDetail', 'organizationDetail')->get();
        $mapFees = MapFee::with('unit')->get();
        $landUseAreas = LandUseArea::get();
        $officeSetting = OfficeSetting::with('localBody')->first();
        $structureTypes = StructureType::latest()->get();
        $allDistricts = get_districts();

        return response()->json([
            'setting' => SettingResource::make($setting),
            'organizations' => $organizations,
          'mapFees' => $mapFees,
          'landUseAreas' => $landUseAreas,
            'officeSetting' => $officeSetting,
            'structureTypes' => $structureTypes,
            'allDistricts' => $allDistricts,

        ]);
    }



    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Organization $organization)
    {
        return OrganizationResource::make($organization);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
