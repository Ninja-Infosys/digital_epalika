<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\EMap\Enums\NeighbourTypeEnum;

class UpdateBuildingDescriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'direction' => ['required',Rule::enum(NeighbourTypeEnum::class)],
            'has_road' => ['required'],
            'has_window' => ['required'],
            'minimum_distance_to_leave' => ['required'],
            'leave' => ['required'],
            'remarks' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'has_road.required' => 'सडक छ, छैन अनिवार्य छ|',
            'has_window.required' => 'झ्याल ढोका छ, छैन अनिवार्य छ|',
            'minimum_distance_to_leave.required' => 'न्यूनतम छाड्नु पर्ने अनिवार्य छ|',
            'leave.required' => 'छाडिएको अनिवार्य छ|',
        ];
    }
}
