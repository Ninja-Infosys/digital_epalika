<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFourFortDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'detail' => ['required'],
            'east' => ['required'],
            'south' => ['required'],
            'west' => ['required'],
            'north' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'detail.required' => 'चार किल्लाको विवरण अनिवार्य छ|',
            'east.required' => 'पूर्व दिशा अनिवार्य छ|',
            'south.required' => 'दक्षिण दिशा अनिवार्य छ|',
            'west.required' => 'पश्चिम दिशा अनिवार्य छ|',
            'north.required' => 'उत्तर दिशा अनिवार्य छ|',
        ];
    }
}
