<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Enums\ApplicantTypeEnum;

class UpdateBuildingApplicantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'applicant_type' => ['required', new Enum(ApplicantTypeEnum::class)],
            'applicant_name' => ['required'],
            'applicant_phone_no' => ['required'],
            'applicant_age' => ['required'],
            'application_date' => ['nullable'],
            'applicant_signature' => ['nullable', 'image'],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' =>['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'applicant_ward_no' => ['required'],
            'applicant_tole' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'applicant_type.required' => 'निवेदकको प्रकार अनिवार्य छ|',
            'applicant_name.required' => 'नाम अनिवार्य छ|',
            'applicant_phone_no.required' => 'फोन न. अनिवार्य छ|',
            'applicant_age.required' => 'उमेर अनिवार्य छ|',
            'province_id.required' => 'प्रदेश अनिवार्य छ |',
            'district_id.required' => 'जिल्ला अनिवार्य छ |',
            'local_body_id.required' => 'पालिका अनिवार्य छ |',
            'applicant_tole.required' => 'गाउँ/टोल अनिवार्य छ |',
            'applicant_ward_no.required' => ' वडा नं. अनिवार्य छ|',
        ];
    }
}
