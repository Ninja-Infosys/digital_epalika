<?php

namespace Modules\EMap\Http\Controllers\Api;

use App\Models\Settings\OfficeSetting;
use App\Notifications\BuildingApplicationNotification;
use App\Notifications\MapApplyNotification;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Http\Requests\Api\BuildingApplicationRequest;
use Modules\EMap\Http\Requests\Api\MapApplicationRequest;
use Modules\EMap\Transformers\BuildingApplicationResource;
use Modules\EMap\Transformers\MapApplyResource;

class MapApplicationController extends Controller
{
    public function registerApplication(MapApplicationRequest $request)
    {

        $mapApply = DB::transaction(function () use ($request) {
            $mapApply = MapApply::create($request->validated() + [
                    'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
                    'sent_to_organization' => 'pending'
                ]);

            $mapApply->landDetail()->create($request->validated('landDetail') + [
                    'unit_id' => MapSetting::first()->land_measurement_standard_id ?? null,
                ]);

            $mapApply->houseOwner()->create($request->validated('houseOwner'));

            $mapApply->landOwner()->create($request->validated('landOwner'));

            $mapApply->applicantDetail()->create($request->validated('applicantDetail'));

            Notification::send($mapApply->organization, new MapApplyNotification($mapApply));

            return $mapApply;
        });
        return response()->json([
            'message' => 'Map Applied Successfully',
            'data' => MapApplyResource::make($mapApply)
        ], 201);
    }
    public function registerBuildingApplication(BuildingApplicationRequest $request)
    {

        $buildingDocumentation = DB::transaction(function () use ($request) {
            $buildingDocumentation = BuildingDocumentation::create($request->validated() + [
                    'fiscal_year_id' => OfficeSetting::first()->fiscal_year_id,
                    'sent_to_organization' => 'pending'
                ]);

            $buildingDocumentation->buildingHouseOwner()->create($request->validated('buildingHouseOwner'));


            $buildingDocumentation->buildingLandOwner()->create($request->validated('buildingLandOwner'));


// dd($buildingDocumentation);
            // Notification::send($buildingDocumentation->organization, new BuildingApplicationNotification($buildingDocumentation));

            return $buildingDocumentation;
        });
        return response()->json([
            'message' => 'Building Registration Application Applied Successfully',
            'data' => BuildingApplicationResource::make($buildingDocumentation)
        ], 201);
    }
}
