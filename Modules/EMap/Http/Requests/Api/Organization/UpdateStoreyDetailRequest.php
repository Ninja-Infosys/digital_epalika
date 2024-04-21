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
            'area_of_proposed_construction' => ['required'],
            'area_of_former_construction' => ['required'],
            'total_area' => ['required'],
            'height' => ['required'],
            'room' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'map_fee_id.required' => 'तल्ला अनिवार्य छ|',
            'area_of_proposed_construction.required' => ' प्रस्तावित  क्षेत्रफल अनिवार्य छ|',
            'area_of_former_construction.required' => 'साविक क्षेत्रफल अनिवार्य छ|',
            'total_area.required' => 'जम्मा क्षेत्रफल अनिवार्य छ|',
            'height.required' => 'उचाई अनिवार्य छ|',
            'room.required' => 'कोठा अनिवार्य छ |',
        ];
    }
}
