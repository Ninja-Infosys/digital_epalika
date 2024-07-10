<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContractorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'father_name' => ['required'],
            'grandfather_name' => ['required'],
            'phone' => ['required'],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' =>['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['required', 'integer'],
            'tole' => ['required'],
            'nec_council_no' => ['nullable'],
            'local_body_registration_no' => ['nullable'],
            'consulting_firm_name' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'नाम अनिवार्य छ|',
            'father_name.required' => 'बुबाको नाम अनिवार्य छ|',
            'grand_father_name.required' => 'हजुरबुबाको नाम अनिवार्य छ|',
            'phone.required' => ' फोन अनिवार्य छ|',
            'province_id.required' => 'प्रदेश अनिवार्य छ |',
            'district_id.required' => 'जिल्ला अनिवार्य छ |',
            'local_body_id.required' => 'पालिका अनिवार्य छ |',
            'tole.required' => 'गाउँ/टोल अनिवार्य छ |',
            'ward_no.required' => ' वडा नं. अनिवार्य छ|',
            'post.required' => 'पद अनिवार्य छ|'
        ];
    }
}
