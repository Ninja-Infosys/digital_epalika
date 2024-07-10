<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingConsultancyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'consultant_engineer_signature' => ['nullable', 'image'],
            'consultant_engineer_name' => ['required'],
            'consultant_engineer_post' => ['required'],
            'n_e_c_registration_no' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'consultant_engineer_signature.required' => 'इंन्जिनियरको सहि अनिवार्य छ|',
            'consultant_engineer_signature.image' => 'सहिको फोटो हुनुपर्छ |',
            'consultant_engineer_name.required' => 'नाम अनिवार्य छ|',
            'consultant_engineer_post.required' => ' पद अनिवार्य छ|',
            'n_e_c_registration_no.required' => ' एन. ई. सी. नं अनिवार्य छ|',
        ];
    }
}
