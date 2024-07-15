<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreyDescriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['nullable',Rule::exists('building_storey_details', 'id')],
            'map_fee_id' => ['required',Rule::exists('map_fees', 'id')],
            'length' => ['required'],
            'width' => ['required'],
            'height' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'map_fee_id.required' => 'तल्ला अनिवार्य छ|',
            'length.required' => ' लम्बाई अनिवार्य छ|',
            'width.required' => ' चौडाई अनिवार्य छ|',
            'height.required' => ' उचाई अनिवार्य छ|',
        ];
    }
}
