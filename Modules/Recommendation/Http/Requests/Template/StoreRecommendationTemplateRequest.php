<?php

namespace Modules\Recommendation\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class StoreRecommendationTemplateRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('recommendationTemplate_create');
    }

    public function rules():array
    {
        return [
            'title' => ['required'],
            'data' => ['required']
        ];
    }
}
