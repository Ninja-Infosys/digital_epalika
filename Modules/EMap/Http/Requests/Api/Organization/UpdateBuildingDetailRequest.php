<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\EMap\Enums\BuildingDetailEnum;
use Modules\EMap\Enums\DetailsRegardingCriteriaEnum;

class UpdateBuildingDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'detail' => ['required',Rule::enum(BuildingDetailEnum::class)],
            'description' => ['required'],
            'remarks' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'विवरण अनिवार्य छ|',
        ];
    }
}
