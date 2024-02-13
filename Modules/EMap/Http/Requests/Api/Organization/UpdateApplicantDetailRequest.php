<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Enums\ApplicantTypeEnum;

class UpdateApplicantDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'applicant_type' => ['required', new Enum(ApplicantTypeEnum::class)],
            'relation_with_owner' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'father_name' => ['required'],
            'citizenship_issue_district_id' => ['required'],
            'citizenship_no' => ['required'],
            'citizenship_issue_date' => ['required'],
            'application_date' => ['nullable'],
            'signature' => ['nullable', 'image'],
        ];
    }

    public function messages(): array
    {
        return [
            'applicant_type.required' => 'निवेदकको प्रकार अनिवार्य छ|',
            'relation_with_owner.required' => ' सम्बन्ध अनिवार्य छ|',
            'name.required' => 'नाम अनिवार्य छ|',
            'phone.required' => 'फोन न. अनिवार्य छ|',
            'father_name.required' => 'वाबुको नाम अनिवार्य छ|',
            'citizenship_issue_district_id.required' => 'जारी जिल्ला अनिवार्य छ|',
            'citizenship_no.required' => 'नागरिकता न. अनिवार्य छ|',
            'citizenship_issue_date.required' => 'जारी मिति अनिवार्य छ|',
        ];
    }
}
