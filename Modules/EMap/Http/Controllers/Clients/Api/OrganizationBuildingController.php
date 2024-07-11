<?php

namespace Modules\EMap\Http\Controllers\Clients\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\BuildingDescription;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingHouseOwner;
use Modules\EMap\Entities\BuildingLandOwner;
use Modules\EMap\Entities\BuildingStoreyDetail;
use Modules\EMap\Entities\ContractorDetail;
use Modules\EMap\Entities\Neighbour;
use Modules\EMap\Enums\NeighbourTypeEnum;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingApplicantRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingApplicationRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingConsultancyRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingDescriptionRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingHouseOwnerRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingLandDetailRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingLandOwnerRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingNeighbourRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateBuildingStoreyDetailRequest;
use Modules\EMap\Http\Requests\Api\OrganizationBuilding\UpdateContractorRequest;
use Modules\EMap\Transformers\BuildingApplicantResource;
use Modules\EMap\Transformers\BuildingHouseOwnerResource;
use Modules\EMap\Transformers\BuildingLandOwnerResource;
use Modules\EMap\Transformers\BuildingNeighbourResource;
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
        dd($request);
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



    public function updateBuildingApplicantDetail(UpdateBuildingApplicantRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->update($request->validated());
        return response()->json([
            'message' => 'निवेदकको विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function buildingNeighbours(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('neighbours');

        $neighbours = collect();

        foreach (NeighbourTypeEnum::cases() as $forts) {
            $fortData = $buildingDocumentation->neighbours->where('direction', $forts)->first();

            $neighbours->push([
                'direction' => $forts->value ?? null,
                'direction_label' => $forts?->label() ?? null,
                'neighbour_name' => $fortData->neighbour_name ?? null,
                'ward_no' => $fortData->ward_no ?? null,
                'plot_no' => $fortData->plot_no ?? null,
            ]);
        }

        return response()->json([
            'data' => $neighbours,
        ]);

    }

    public function updateBuildingNeighbourDetail(UpdateBuildingNeighbourRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        $formData = $request->validated();
        Neighbour::updateOrCreate(
            ['building_documentation_id' => $buildingDocumentation->id, 'direction' => $formData['direction']],
            [
                'neighbour_name' => $formData['neighbour_name'] ?? null,
                'ward_no' => $formData['ward_no'] ?? null,
                'plot_no' => $formData['plot_no'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'संघीयारको विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

    public function contractorDetails(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('contractorDetails');

        $contractorDetails = collect();

            $contractor = $buildingDocumentation->contractorDetails->load('province', 'district', 'localBody')?->first();

            $contractorDetails->push([
                'name' => $contractor->name ?? null,
                'father_name' => $contractor->father_name ?? null,
                'grandfather_name' => $contractor->grandfather_name ?? null,
                'phone' => $contractor->phone ?? null,
                'province_id' => $contractor->province_id ?? '',
                'province' => $contractor->province?->province ?? '',
                'district_id' => $contractor->district_id ?? '',
                'district' => $contractor->district?->district ?? '',
                'local_body_id' => $contractor->local_body_id ?? '',
                'local_body' => $contractor->localBody?->local_body ?? '',
                'tole' => $contractor->tole ?? '',
                'ward_no' => $contractor->ward_no ?? null,
                'nec_council_no' => $contractor->nec_council_no ?? null,
                'local_body_registration_no' => $contractor->local_body_registration_no ?? null,
                'consulting_firm_name' => $contractor->consulting_firm_name ?? null,
            ]);


        return response()->json([
            'data' => $contractorDetails,
        ]);
    }

    public function updateContractorDetail(UpdateContractorRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        $formData = $request->validated();

        ContractorDetail::updateOrCreate(
            ['building_documentation_id' => $buildingDocumentation->id],
            $formData
        );

        return response()->json([
            'message' => 'ठेकेदारको विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }

      public function buildingDescriptions(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load('buildingDescriptions');

        $buildingDescriptions = collect();

        foreach (NeighbourTypeEnum::cases() as $criteria) {
            $criteriaData = $buildingDocumentation->buildingDescriptions?->where('direction', $criteria)->first();

            $buildingDescriptions->push([
                'direction' => $criteria->value,
                'direction_label' => $criteria?->label(),
                'has_road' => $criteriaData->has_road ?? '',
                'has_window' => $criteriaData->has_window ?? '',
                'minimum_distance_to_leave' => $criteriaData->minimum_distance_to_leave ?? '',
                'leave' => $criteriaData->leave ?? '',
                'remarks' => $criteriaData->remarks ?? '',
            ]);
        }

        return response()->json([
            'data' => $buildingDescriptions,
        ]);
    }

    public function updateBuildingDescription(UpdateBuildingDescriptionRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        $formData = $request->validated();

        BuildingDescription::updateOrCreate(
            ['building_documentation_id' => $buildingDocumentation->id, 'direction' => $formData['direction']],
            [
                'has_road' => $formData['has_road'] ?? null,
                'has_window' => $formData['has_window'] ?? null,
                'minimum_distance_to_leave' => $formData['minimum_distance_to_leave'] ?? null,
                'leave' => $formData['leave'] ,
                'remarks' => $formData['remarks'] ?? null,
            ]
        );

        return response()->json([
            'message' => 'मापदण्ड सम्बन्धि विवरण सफलतापूर्वक अद्यावधिक गरियो',
        ]);
    }


    public function updateBuildingConsultancyDetail(UpdateBuildingConsultancyRequest $request, BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->update($request->validated());

        return response()->json([
            'message' => 'Consultancy Detail Updated Successfully',
        ]);
    }

}
