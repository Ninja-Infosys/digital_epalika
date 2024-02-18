<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\EMap\Enums\BuildingDetailEnum;
use Modules\EMap\Enums\DetailsRegardingCriteriaEnum;

class UpdateConsultancyDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'consultant_signature' => ['nullable', 'image'],
            'consultant_name' => ['required'],
            'consultant_mobile_no' => ['required'],
            'consultant_nec_no' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'consultant_signature.required' => 'इंन्जिनियरको सहि अनिवार्य छ|',
            'consultant_signature.image' => 'सहिको फोटो हुनुपर्छ |',
            'consultant_name.required' => 'नाम अनिवार्य छ|',
            'consultant_mobile_no.required' => ' मोबाइल नं. अनिवार्य छ|',
            'consultant_nec_no.required' => ' एन. ई. सी. नं अनिवार्य छ|',
        ];
    }
}
