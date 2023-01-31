<?php

namespace Modules\Recommendation\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecommendationTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'recommendation_category_id' => ['required'],
            'data' => ['required'],
            'title' => ['required','string'],
            'is_active'=>['nullable','boolean']
        ];
    }
}
