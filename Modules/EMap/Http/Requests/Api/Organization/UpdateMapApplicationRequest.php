<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\CategorizationEnum;
use Modules\EMap\Enums\TypeOfConstructionWorkEnum;

class UpdateMapApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'construction_type' => ['required', new Enum(TypeOfConstructionWorkEnum::class)],
            'usage' => ['required', new Enum(BuildingUsageEnum::class)],
            'building_category' => ['required', new Enum(CategorizationEnum::class)],
            'structure_type_id' => ['nullable',Rule::exists('structure_types', 'id')],
            'structure_type' => ['nullable'],
            'current_storey' => ['required','numeric'],
            'future_storey' => ['required','numeric'],
            'area_of_plinth' => ['required','numeric'],
            'length' => ['required','numeric'],
            'breadth' => ['required','numeric'],
            'height' => ['required','numeric'],
        ];
    }
}
