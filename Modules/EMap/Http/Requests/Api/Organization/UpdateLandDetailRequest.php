<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLandDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'land_use_area_id' => ['required',Rule::exists('land_use_areas', 'id')],
            'ward_no' => ['required', 'integer'],
            'former_ward_no' => ['required', 'integer'],
            'tole' => ['nullable'],
            'street_code_no' => ['nullable'],
            'plot_no' => ['required'],
            'unit_value' => ['nullable'],
            'percentage_of_area_covered_by_building' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'land_use_area_id.required' => 'भू-उपयोग्य क्षेत्र अनिवार्य छ|',
            'land_use_area_id.numeric' => 'भू-उपयोग्य क्षेत्र नम्बरमा हुनुपर्छ|',
            'ward_no.required' => 'वडा नं अनिवार्य छ|',
            'ward_no.integer' => 'वडा नं नम्बरमा हुनुपर्छ|',
            'former_ward_no.required' => ' साविक वडा नं अनिवार्य छ|',
            'former_ward_no.integer' => ' साविक वडा नं नम्बरमा हुनुपर्छ|',
            'plot_no.required' => 'कित्ता नं अनिवार्य छ|',
            'percentage_of_area_covered_by_building.required' => ' क्षेत्रफलको प्रतिशत अनिवार्य छ|',
            'percentage_of_area_covered_by_building.numeric' => 'क्षेत्रफलको प्रतिशत नम्बरमा हुनुपर्छ|',
        ];
    }
}
