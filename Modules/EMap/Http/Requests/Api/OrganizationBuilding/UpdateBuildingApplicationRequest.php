<?php

namespace Modules\EMap\Http\Requests\Api\OrganizationBuilding;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Enums\BuildingTypeEnum;
use Modules\EMap\Enums\BuildingUsageEnum;
use Modules\EMap\Enums\RoofTypeEnum;

class UpdateBuildingApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'plinth_area' => ['required', 'string'],
            'house_built_year' => ['required', 'string'],
            'room' => ['required','integer'],
            'storey' => ['required', 'integer'],
            'building_category' => ['required', new Enum(BuildingTypeEnum::class)],
            'building_usage' => ['required', new Enum(BuildingUsageEnum::class)],
            'roof_category' => ['required', new Enum(RoofTypeEnum::class)],
            'height' => ['required'],
            'set_back' => ['required','string'],
            'other_construction_area_new' => ['required','string'],
            'other_construction_area_old' => ['required','string'],
            'total_area' => ['required','string'],
        ];
    }
}
