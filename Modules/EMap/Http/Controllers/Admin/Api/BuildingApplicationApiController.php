<?php

namespace Modules\EMap\Http\Controllers\Admin\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Enums\ApplicantTypeEnum;
use Modules\EMap\Enums\ApplicationFormTypeEnum;
use Modules\Plan\Transformers\OrganizationResource;

class BuildingApplicationApiController extends Controller
{
    public function getBuildingSetting(): array
    {
        return [
            'organizations' => OrganizationResource::collection(Organization::with('organizationDetail')->acceptedOrganization()->get()),

            'allDistricts' => get_districts(),


            'applicantTypes' => ApplicantTypeEnum::getValuesWithLabels(),

        ];
    }


    public function store(StoreMapApplyFormRequest $request)
    {
        $data = DB::transaction(function () use ($request) {

            $mapApply = MapApply::create($request->validated() + [
                    'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
                    'mobile_user_id' => auth()->id()
                ]);


            $mapApply->landDetail()
                ->create($request->validated()['landDetail'] + [
                        'unit_id' => MapSetting::first()->land_measurement_standard_id ?? null,
                    ]);

            $mapApply->houseOwner()->create($request->validated()['houseOwner']);

            $mapApply->landOwner()->create($request->validated()['landOwner']);

            $mapApply->applicantDetail()->create($request->validated()['applicantDetail']);

            //            Notification::send($mapApply->organization, new MapApplyNotification($mapApply));

            return $mapApply;
        });
        return response()->json([
            'message' => 'Map Applied Successfully'
        ], 201);
    }

    public function registeredMap()
    {
        return MapApplyResource::collection(auth()->user()?->load('mapApplies.houseOwner')?->mapApplies);
    }



}
