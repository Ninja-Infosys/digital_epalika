<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\EMap\Enums\DetailsRegardingCriteriaEnum;

class UpdateCriteriaDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'detail' => ['required',Rule::enum(DetailsRegardingCriteriaEnum::class)],
            'according_to_criteria' => ['required'],
            'according_to_map' => ['required'],
            'compliance' => ['required'],
            'remarks' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'according_to_criteria.required' => 'मापदण्ड अनुसार अनिवार्य छ|',
            'according_to_map.required' => 'नक्सा अनुसार अनिवार्य छ|',
            'compliance.required' => 'अनुपालन अनिवार्य छ|',
        ];
    }
}
