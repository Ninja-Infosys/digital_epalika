<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBuildingStoreyDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'storey' => ['required'],
            'area_of_former_construction' => ['required'],
            'land_area' => ['required'],
            'remarks' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'storey.required' => 'तल्ला अनिवार्य छ|',
            'area_of_former_construction.required' => ' निर्माणको क्षेत्रफल अनिवार्य छ|',
            'land_area.required' => ' निर्माण भैसकेको जम्मा क्षेत्रफल अनिवार्य छ|',
            'remarks.required' => 'कैफियत अनिवार्य छ|',
        ];
    }
}
