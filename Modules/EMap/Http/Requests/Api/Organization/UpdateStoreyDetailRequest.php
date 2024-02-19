<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreyDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['nullable',Rule::exists('storey_details', 'id')],
            'map_fee_id' => ['required',Rule::exists('map_fees', 'id')],
            'area_of_proposed_construction' => ['required','numeric'],
            'area_of_former_construction' => ['required','numeric'],
            'total_area' => ['required','numeric'],
            'height' => ['required','numeric'],
            'room' => ['required','numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'map_fee_id.required' => 'तल्ला अनिवार्य छ|',
            'area_of_proposed_construction.required' => ' प्रस्तावित  क्षेत्रफल अनिवार्य छ|',
            'area_of_proposed_construction.numeric' => 'प्रस्तावित  क्षेत्रफल नम्बरमा हुनुपर्छ|',
            'area_of_former_construction.required' => 'साविक क्षेत्रफल अनिवार्य छ|',
            'area_of_former_construction.numeric' => 'साविक क्षेत्रफल नम्बरमा हुनुपर्छ|',
            'total_area.required' => 'जम्मा क्षेत्रफल अनिवार्य छ|',
            'total_area.numeric' => 'जम्मा क्षेत्रफल नम्बरमा हुनुपर्छ|',
            'height.required' => 'उचाई अनिवार्य छ|',
            'height.numeric' => 'उचाई नम्बरमा हुनुपर्छ|',
            'room.required' =>'कोठा अनिवार्य छ |',
            'room.numeric' => 'कोठा नम्बरमा हुनुपर्छ |' 
        ];
    }
}
