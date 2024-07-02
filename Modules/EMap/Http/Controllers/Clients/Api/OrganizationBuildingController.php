<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingHouseOwner;
use Modules\EMap\Entities\BuildingLandOwner;
use Modules\EMap\Entities\BuildingStoreyDetail;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingApplicationRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingHouseOwnerRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingLandDetailRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingLandOwnerRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingStoreyDetailRequest;
use Modules\EMap\Transformers\BuildingHouseOwnerResource;
use Modules\EMap\Transformers\BuildingLandOwnerResource;
use Modules\EMap\Transformers\BuildingStoreyDetailResource;

class OrganizationBuildingController extends Controller
{
    public function updateBuildingApplication(UpdateBuildingApplicationRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        $formData = $request->validated();

        DB::transaction(function () use ($formData, $buildingDocumentation) {
            $buildingDocumentation->update($formData);
        });

        return response()->json([
            'message' => 'नक्सा आवेदन सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }


    public function buildingStoreyDetails(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('buildingStoreyDetails')->loadCount('buildingStoreyDetails');

        return response()->json([
            'current_storey' => $buildingDocumentation->current_storey,
            'storey_details_count' => $buildingDocumentation->storey_details_count,
            'data' => BuildingStoreyDetailResource::collection($buildingDocumentation->buildingStoreyDetails),
        ]);
    }

    public function updateBuildingStoreyDetail(UpdateBuildingStoreyDetailRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        $formData = Arr::except($request->validated(), ['id']);

        DB::transaction(function () use ($formData, $request, $buildingDocumentation) {

            if (! empty($request->validated('id'))) {
                BuildingStoreyDetail::find($request->validated('id'))?->update($formData);
            } else {
                BuildingStoreyDetail::create($formData + [
                    'building_documentation_id' => $buildingDocumentation->id,
                ]);
            }
        });

        return response()->json([
            'message' => 'तल्लाको विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function deleteBuildingStoreyDetail(BuildingDocumentation $buildingDocumentation, BuildingStoreyDetail $buildingStoreyDetail)
    {
        $buildingStoreyDetail->delete();

        return response()->json([
            'message' => 'तल्लाको विवरण सफलतापूर्वक सफलतापूर्वक मेटाइयो',
        ]);
    }

    public function updateBuildingLandDetail(UpdateBuildingLandDetailRequest $request, BuildingDocumentation $buildingDocumentation)
    {

        $buildingDocumentation->update($request->validated());

        return response()->json([
            'message' => 'जग्गाको विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function buildingLandOwnerDetail(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('buildingLandOwner');

        return BuildingLandOwnerResource::make($buildingDocumentation->buildingLandOwner);
    }

    public function updateBuildingLandOwner(UpdateBuildingLandOwnerRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        BuildingLandOwner::updateOrCreate(
            ['building_documentation_id' => $buildingDocumentation->id],
            $request->validated()
        );

        return response()->json([
            'message' => 'जग्गा धनीको विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function buildingHouseOwnerDetail(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('buildingHouseOwner');

        return BuildingHouseOwnerResource::make($buildingDocumentation->buildingHouseOwner);
    }

    public function updateBuildingHouseOwner(UpdateBuildingHouseOwnerRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        BuildingHouseOwner::updateOrCreate(
            ['building_documentation_id' => $buildingDocumentation->id],
            $request->validated()
        );

        return response()->json([
            'message' => 'घर धनीको विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

}
