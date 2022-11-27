<?php

namespace Modules\Recommendation\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class UpdateRecommendationTemplateRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title' => ['required'],
            'for' => ['required', new Enum(ApplicationTypeEnum::class)],
            'data' => ['required'],
            'requires_header' => ['nullable', 'boolean'],
        ];
    }
}
