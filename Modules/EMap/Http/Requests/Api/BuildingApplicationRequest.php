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
            'plinth_area' => ['required'],
            'house_built_year' => ['required'],
            'organization_id' => ['required'],
            'room' => ['required'],
            'storey' => ['required'],
            'landDetail.land_ward_no' => ['required'],
            'landDetail.former_local_body' => ['nullable'],
            'landDetail.former_ward_no' => ['nullable'],
            'landDetail.land_tole' => ['required'],
            'landDetail.plot_no' => ['required'],


            'landOwner.name' => ['required'],
            'landOwner.phone' => ['required'],
            'landOwner.father_name' => ['required'],
            'landOwner.grandfather_name' => ['required'],
            'landOwner.citizenship_no' => ['required'],
            'landOwner.citizenship_issue_date' => ['required'],
            'landOwner.citizenship_issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'landOwner.province_id' => ['required', Rule::exists('provinces', 'id')],
            'landOwner.district_id' => ['required', Rule::exists('districts', 'id')],
            'landOwner.local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'landOwner.ward_no' => ['required'],
            'landOwner.tole' => ['required'],
            'landOwner.photo' => ['nullable', 'image'],
            'landOwner.signature' => ['nullable', 'image'],
            'houseOwner.name' => ['required'],
            'houseOwner.phone' => ['required'],
            'houseOwner.father_name' => ['required'],
            'houseOwner.grandfather_name' => ['required'],
            'houseOwner.citizenship_no' => ['required'],
            'houseOwner.citizenship_issue_date' => ['required'],
            'houseOwner.citizenship_issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'houseOwner.province_id' => ['required', Rule::exists('provinces', 'id')],
            'houseOwner.district_id' => ['required', Rule::exists('districts', 'id')],
            'houseOwner.local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'houseOwner.ward_no' => ['required'],
            'houseOwner.tole' => ['required'],
            'houseOwner.photo' => ['nullable','image'],
            'houseOwner.signature' => ['nullable','image'],
            'applicantDetail.applicant_type' => ['required', new Enum(ApplicantTypeEnum::class)],
            'applicantDetail.applicant_name' => ['required'],
            'applicantDetail.phone' => ['required'],
            'applicantDetail.applicant_phone_no' => ['required'],
            'applicantDetail.applicant_age' => ['required'],
           'applicantDetail.province_id' => ['required', Rule::exists('provinces', 'id')],
            'applicantDetail.district_id' =>['required', Rule::exists('districts', 'id')],
            'applicantDetail.local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'applicantDetail.applicant_ward_no' => ['required'],
            'applicantDetail.applicant_tole' => ['required'],
            'applicantDetail.application_date' => ['nullable'],
            'applicantDetail.applicant_signature' => ['nullable','image'],
        ];
    }
}
