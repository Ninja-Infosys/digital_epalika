<?php

namespace Modules\EMap\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Enums\ApplicantTypeEnum;
use Modules\EMap\Enums\ApplicationFormTypeEnum;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\LandOwnerTypeEnum;
use Modules\EMap\Enums\TypeOfConstructionWorkEnum;

class MapApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'application_type' => ['required', new Enum(ApplicationFormTypeEnum::class)],
            'construction_type' => ['required', new Enum(TypeOfConstructionWorkEnum::class)],
            //'usage' => ['required', new Enum(BuildingUsageEnum::class)],
            'current_storey' => ['required'],
            'future_storey' => ['required'],
            'organization_id' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'landDetail.ward_no' => ['required'],
            'landDetail.former_local_body' => ['nullable'],
            'landDetail.former_ward_no' => ['nullable'],
            'landDetail.tole' => ['required'],
            'landDetail.plot_no' => ['required'],
            'landDetail.unit_value' => ['required'],
            'landOwner.land_owner_type' => ['required', new Enum(LandOwnerTypeEnum::class)],
            'landOwner.name' => ['required'],
            'landOwner.phone' => ['required'],
            'landOwner.father_name' => ['required'],
            'landOwner.grandfather_name' => ['required'],
            'landOwner.citizenship_no' => ['required'],
            'landOwner.citizenship_issue_date' => ['required'],
            'landOwner.citizenship_issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'landOwner.province_id' => ['required'],
            'landOwner.district_id' => ['required'],
            'landOwner.local_body_id' => ['required'],
            'landOwner.ward_no' => ['required'],
            'landOwner.tole' => ['required'],
            'landOwner.photo' => ['nullable', 'image'],
            'houseOwner.name' => ['required'],
            'houseOwner.phone' => ['required'],
            'houseOwner.father_name' => ['required'],
            'houseOwner.grandfather_name' => ['required'],
            'houseOwner.citizenship_no' => ['required'],
            'houseOwner.citizenship_issue_date' => ['required'],
            'houseOwner.citizenship_issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'houseOwner.province_id' => ['required'],
            'houseOwner.district_id' => ['required'],
            'houseOwner.local_body_id' => ['required'],
            'houseOwner.ward_no' => ['required'],
            'houseOwner.tole' => ['required'],
            'houseOwner.photo' => ['nullable','image'],
            'applicantDetail.applicant_type' => ['required', new Enum(ApplicantTypeEnum::class)],
            'applicantDetail.relation_with_owner' => ['required'],
            'applicantDetail.name' => ['required'],
            'applicantDetail.phone' => ['required'],
            'applicantDetail.father_name' => ['required'],
            'applicantDetail.citizenship_no' => ['required'],
            'applicantDetail.citizenship_issue_date' => ['required'],
            'applicantDetail.citizenship_issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'applicantDetail.application_date' => ['nullable'],
            'applicantDetail.signature' => ['nullable','image'],
        ];
    }
}
