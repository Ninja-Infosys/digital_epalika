<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingStoreyDetail;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingApplicationRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingStoreyDetailRequest;
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
            'storey' => $buildingDocumentation->storey,
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

    public function edit($id)
    {
        return view('emap::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
