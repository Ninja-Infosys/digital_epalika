<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\StoreyDetail;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Http\Requests\Api\Organization\UpdateLandDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateMapApplicationRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateStoreyDetailRequest;
use Modules\EMap\Transformers\StoreyDetailResource;

class OrganizationApplicationsController extends Controller
{
    public function updateMapApplication(UpdateMapApplicationRequest $request, MapApply $mapApply)
    {
        $formData = $request->validated();

        DB::transaction(function () use ($formData, $mapApply) {
            if (empty($formData['structure_type_id']) && !empty($formData['structure_type'])) {
                $structure_type = StructureType::create(['title' => $formData['structure_type']]);
                $formData['structure_type_id'] = $structure_type->id;
            }

            $mapApply->update($formData);
        });

        return response()->json([
            'message' => 'नक्सा आवेदन सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function storeyDetails(MapApply $mapApply)
    {
        $mapApply->load('storeyDetails.mapFee')->loadCount('storeyDetails');

        return response()->json([
            'current_storey' => $mapApply->current_storey,
            'storey_details_count' => $mapApply->storey_details_count,
            'data' => StoreyDetailResource::collection($mapApply->storeyDetails),
        ]);
    }

    public function updateStoreyDetail(UpdateStoreyDetailRequest $request, MapApply $mapApply)
    {
        $formData = Arr::except($request->validated(), ['id']);

        DB::transaction(function () use ($formData, $request, $mapApply) {

            if (!empty($request->validated('id'))) {
                StoreyDetail::find($request->validated('id'))?->update($formData);
            } else {
                StoreyDetail::create($formData + [
                    'map_apply_id' => $mapApply->id
                    ]);
            }
        });

        return response()->json([
            'message' => 'तल्लाको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function deleteStoreyDetail(MapApply $mapApply, StoreyDetail $storeyDetail)
    {
        $storeyDetail->delete();

        return response()->json([
            'message' => 'तल्लाको विवरण सफलतापूर्वक सफलतापूर्वक मेटाइयो'
        ]);
    }

    public function updateLandDetail(UpdateLandDetailRequest $request, MapApply $mapApply)
    {
        $mapApply->landDetail()->update($request->validated() + [
                'unit_id' => MapSetting::first()->land_measurement_standard_id ?? null,
            ]);

        return response()->json([
            'message' => 'जग्गाको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }
}
