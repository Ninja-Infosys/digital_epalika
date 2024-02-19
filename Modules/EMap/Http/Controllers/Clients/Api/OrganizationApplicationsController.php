<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\ApplicantDetail;
use Modules\EMap\Entities\BuildingDetail;
use Modules\EMap\Entities\CriteriaDetail;
use Modules\EMap\Entities\DesignerDetail;
use Modules\EMap\Entities\FourFort;
use Modules\EMap\Entities\HouseOwner;
use Modules\EMap\Entities\LandOwner;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Entities\StoreyDetail;
use Modules\EMap\Entities\StructureType;
use Modules\EMap\Enums\BuildingDetailEnum;
use Modules\EMap\Enums\DetailsRegardingCriteriaEnum;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;
use Modules\EMap\Http\Requests\Api\Organization\UpdateApplicantDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateBuildingDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateConsultancyDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateCriteriaDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateDesignerDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateFourFortDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateHouseOwnerRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateLandOwnerRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateLandDetailRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateMapApplicationRequest;
use Modules\EMap\Http\Requests\Api\Organization\UpdateStoreyDetailRequest;
use Modules\EMap\Transformers\ApplicantDetailResource;
use Modules\EMap\Transformers\HouseOwnerResource;
use Modules\EMap\Transformers\LandOwnerResource;
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

    public function landOwnerDetail(MapApply $mapApply)
    {
        $mapApply->load('landOwner');

        return LandOwnerResource::make($mapApply->landOwner);
    }

    public function updateLandOwner(UpdateLandOwnerRequest $request, MapApply $mapApply)
    {
        LandOwner::updateOrCreate(
            ['map_apply_id' => $mapApply->id],
            $request->validated()
        );

        return response()->json([
            'message' => 'जग्गा धनीको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function houseOwnerDetail(MapApply $mapApply)
    {
        $mapApply->load('houseOwner');

        return HouseOwnerResource::make($mapApply->houseOwner);
    }

    public function updateHouseOwner(UpdateHouseOwnerRequest $request, MapApply $mapApply)
    {
        HouseOwner::updateOrCreate(
            ['map_apply_id' => $mapApply->id],
            $request->validated()
        );

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
                'province_id'=>$designer->province_id ?? '',
                'district_id'=>$designer->district_id ?? '',
                'local_body_id'=>$designer->local_body_id ?? '',
                'tole'=>$designer->tole ?? '',
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

    public function applicantDetail(MapApply $mapApply)
    {
        $mapApply->load('applicantDetail');

        return ApplicantDetailResource::make($mapApply->applicantDetail);
    }

    public function updateApplicantDetail(UpdateApplicantDetailRequest $request, MapApply $mapApply)
    {
        ApplicantDetail::updateOrCreate(
            ['map_apply_id' => $mapApply->id],
            $request->validated()
        );

        return response()->json([
            'message' => 'निवेदकको विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function criteriaDetails(MapApply $mapApply)
    {
        $mapApply->load('criteriaDetails');

        $criteriaDetails = collect();

        foreach (DetailsRegardingCriteriaEnum::cases() as $criteria) {
            $criteriaData = $mapApply->criteriaDetails?->where('detail', $criteria)->first();

            $criteriaDetails->push([
                'detail' => $criteria->value,
                'detail_label' => $criteria?->label(),
                'according_to_criteria' => $criteriaData->according_to_criteria ?? '',
                'according_to_map' => $criteriaData->according_to_map ?? '',
                'compliance' => $criteriaData->compliance ?? '',
                'remarks' => $criteriaData->remarks ?? $criteria->remarks(),
            ]);
        }

        return response()->json([
            'data' => $criteriaDetails,
        ]);
    }

    public function updateCriteriaDetail(UpdateCriteriaDetailRequest $request, MapApply $mapApply)
    {
        $formData = $request->validated();

        CriteriaDetail::updateOrCreate(
            ['map_apply_id' => $mapApply->id, 'detail' => $formData['detail']],
            [
                'according_to_criteria' => $formData['according_to_criteria'] ?? null,
                'according_to_map' => $formData['according_to_map'] ?? null,
                'compliance' => $formData['compliance'] ?? null,
                'remarks' => $formData['remarks'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'मापदण्ड सम्बन्धि विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function buildingDetails(MapApply $mapApply)
    {
        $mapApply->load('buildingDetails');

        $buildingDetails = collect();

        foreach (BuildingDetailEnum::cases() as $buildingDetail) {
            $buildingData = $mapApply->buildingDetails?->where('detail', $buildingDetail)->first();

            $buildingDetails->push([
                'detail' => $buildingDetail->value,
                'detail_label' => $buildingDetail?->label(),
                'description' => $buildingData->description ?? '',
                'remarks' => $buildingData->remarks ?? '',
            ]);
        }

        return response()->json([
            'data' => $buildingDetails,
        ]);
    }

    public function updateBuildingDetail(UpdateBuildingDetailRequest $request, MapApply $mapApply)
    {
        $formData = $request->validated();

        BuildingDetail::updateOrCreate(
            ['map_apply_id' => $mapApply->id, 'detail' => $formData['detail']],
            [
                'description' => $formData['description'] ?? null,
                'remarks' => $formData['remarks'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'भवन सम्बन्धि विवरण सफलतापूर्वक अद्यावधिक गरियो'
        ]);
    }

    public function updateConsultancyDetail(UpdateConsultancyDetailRequest $request, MapApply $mapApply)
    {
        $mapApply->update($request->validated());

        return response()->json([
            'message' => 'Consultancy Detail Updated Successfully'
        ]);
    }
}
