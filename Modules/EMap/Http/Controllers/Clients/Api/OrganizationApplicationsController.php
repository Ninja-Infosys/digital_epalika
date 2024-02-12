<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\DesignerDetail;
use Modules\EMap\Entities\FourFort;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\StoreyDetail;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;
use Modules\EMap\Http\Requests\Api\Organization\UpdateApplicantDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateDesignerDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateFourFortDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateHouseOwnerRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateLandOwnerRequest;
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

    public function updateLandOwner(UpdateLandOwnerRequest $request, MapApply $mapApply)
    {
        $mapApply->landOwner()->update($request->validated());

        return response()->json([
            'message' => 'जग्गा धनीको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function updateHouseOwner(UpdateHouseOwnerRequest $request, MapApply $mapApply)
    {
        $mapApply->houseOwner()->update($request->validated());

        return response()->json([
            'message' => 'घर धनीको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function fourForts(MapApply $mapApply)
    {
        $mapApply->load('fourForts');

        $fourForts = collect();

        foreach (FourSideParticularEnum::cases() as $forts) {
            $fortData = $mapApply->fourForts->where('detail', $forts)->first();

            $fourForts->push([
                'detail' => $forts->value ?? null,
                'detail_label' => $forts?->label() ?? null,
                'east' => $fortData->east ?? null,
                'south' => $fortData->south ?? null,
                'west' => $fortData->west ?? null,
                'north' => $fortData->north ?? null,
            ]);
        }

        return response()->json([
            'data' => $fourForts,
        ]);
    }

    public function updateFourFortDetail(UpdateFourFortDetailRequest $request, MapApply $mapApply)
    {
        $formData = $request->validated();

        FourFort::updateOrCreate(
            ['map_apply_id' => $mapApply->id, 'detail' => $formData['detail']],
            [
                'east' => $formData['east'] ?? null,
                'south' => $formData['south'] ?? null,
                'west' => $formData['west'] ?? null,
                'north' => $formData['north'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'चार किल्लाको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function designerDetails(MapApply $mapApply)
    {
        $mapApply->load('designerDetails');

        $designerDetails = collect();

        foreach (PostsEnum::cases() as $postsEnum) {
            $designer = $mapApply->designerDetails?->where('post', $postsEnum)?->first();

            $designerDetails->push([
                'post' => $postsEnum->value,
                'post_label' => $postsEnum->label(),
                'name' => $designer->name ?? null,
                'father_name' => $designer->father_name ?? null,
                'grandfather_name' => $designer->grandfather_name ?? null,
                'phone' => $designer->phone ?? null,
                'address' => $designer->address ?? null,
                'local_body' => $designer->local_body ?? null,
                'ward_no' => $designer->ward_no ?? null,
                'nec_council_no' => $designer->nec_council_no ?? null,
                'local_body_registration_no' => $designer->local_body_registration_no ?? null,
                'consulting_firm_name' => $designer->consulting_firm_name ?? null,
            ]);
        }

        return response()->json([
            'data' => $designerDetails
        ]);
    }

    public function updateDesignerDetail(UpdateDesignerDetailRequest $request, MapApply $mapApply)
    {
        $formData = $request->validated();

        DesignerDetail::updateOrCreate(
            ['map_apply_id' => $mapApply->id, 'post' => $formData['post']],
            $formData
        );

        return response()->json([
            'message' => 'डिजाइनरको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function updateApplicantDetail(UpdateApplicantDetailRequest $request, MapApply $mapApply)
    {
        $mapApply->applicantDetail()->update($request->validated());

        return response()->json([
            'message' => 'निवेदकको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }
}
