<?php

namespace Modules\EMap\Http\Requests\StreetDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Enums\RoadConditionEnum;
use Modules\EMap\Enums\RoadTypeEnum;

class StoreStreetDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [

            'name' => ['required', 'string', 'max:255'],
            'from' => ['nullable','string','max:255'],
            'to' => ['nullable', 'string', 'max:255'],
            'setback' => ['nullable', 'string', 'max:255'],
            'street_code' => ['nullable', 'string', 'max:255'],
           'condition' => ['nullable', new Enum(RoadConditionEnum::class)],
            'wards' => ['nullable', 'string', 'max:255'],
            'right_of_way' => ['nullable', 'string', 'max:255'],
            'width' => ['nullable', 'string', 'max:255'],
            'road_type' => ['nullable', new Enum(RoadTypeEnum::class)],
            'coordinates' => ['nullable', 'json']
        ];
    }
}
