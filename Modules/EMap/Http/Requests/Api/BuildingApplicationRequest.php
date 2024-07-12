<?php

namespace Modules\EMap\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Enums\ApplicantTypeEnum;
use Modules\EMap\Enums\ApplicationFormTypeEnum;

class BuildingApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'organization_id' => ['required'],
            'plinth_area' => ['required'],
            'house_built_year' => ['required'],
            'room' => ['required'],
            'current_storey' => ['required'],
            'former_local_body' => ['nullable'],
            'former_ward_no' => ['nullable'],
            'land_ward_no' => ['required'],
            'plot_no' => ['required'],
            'land_tole' => ['required'],
            'applicant_type' => ['required', new Enum(ApplicantTypeEnum::class)],
            'applicant_name' => ['required'],
            'applicant_phone_no' => ['required'],
           'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' =>['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'applicant_ward_no' => ['required'],
            'applicant_tole' => ['required'],
            'application_date' => ['nullable'],
            'applicant_signature' => ['nullable', 'image'],

            'buildingLandOwner.name' => ['required'],
            'buildingLandOwner.phone' => ['required'],
            'buildingLandOwner.father_name' => ['required'],
            'buildingLandOwner.grandfather_name' => ['required'],
            'buildingLandOwner.citizenship_no' => ['required'],
            'buildingLandOwner.citizenship_issue_date' => ['required'],
            'buildingLandOwner.citizenship_issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'buildingLandOwner.province_id' => ['required', Rule::exists('provinces', 'id')],
            'buildingLandOwner.district_id' => ['required', Rule::exists('districts', 'id')],
            'buildingLandOwner.local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'buildingLandOwner.ward_no' => ['required'],
            'buildingLandOwner.tole' => ['required'],
            'buildingLandOwner.photo' => ['nullable', 'image'],
            'buildingHouseOwner.name' => ['required'],
            'buildingHouseOwner.phone' => ['required'],
            'buildingHouseOwner.father_name' => ['required'],
            'buildingHouseOwner.grandfather_name' => ['required'],
            'buildingHouseOwner.citizenship_no' => ['required'],
            'buildingHouseOwner.citizenship_issue_date' => ['required'],
            'buildingHouseOwner.citizenship_issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'buildingHouseOwner.province_id' => ['required', Rule::exists('provinces', 'id')],
            'buildingHouseOwner.district_id' => ['required', Rule::exists('districts', 'id')],
            'buildingHouseOwner.local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'buildingHouseOwner.ward_no' => ['required'],
            'buildingHouseOwner.tole' => ['required'],
            'buildingHouseOwner.photo' => ['nullable','image'],
        ];
    }
}
