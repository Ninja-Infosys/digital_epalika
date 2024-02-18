<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLandOwnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'land_owner_type' => ['required'],
            'name' => ['required'],
            'phone' => ['nullable'],
            'father_name' => ['required'],
            'grandfather_name' => ['required'],
            'citizenship_issue_district_id' => ['required', 'exists:districts,id'],
            'citizenship_no' => ['required'],
            'citizenship_issue_date' => ['required'],
            'address' => ['required'],
            'local_body' => ['required'],
            'ward_no' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'land_owner_type.required' => 'जग्गा धनीको किसिम अनिवार्य छ|',
            'name.required' => 'नाम अनिवार्य छ|',
            'father_name.required' => ' बुवाको नाम अनिवार्य छ|',
            'citizenship_issue_district_id.required' => 'जिल्ला अनिवार्य छ|',
            'citizenship_no.required' => 'नागरिकत नम्बर अनिवार्य छ|',
            'citizenship_issue_date.required' => ' मिति अनिवार्य छ|',
            'address.required' => ' ठेगाना अनिवार्य छ|',
        ];
    }
}
