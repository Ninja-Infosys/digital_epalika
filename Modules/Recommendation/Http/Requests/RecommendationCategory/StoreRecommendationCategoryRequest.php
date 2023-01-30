<?php

namespace Modules\Recommendation\Http\Requests\RecommendationCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecommendationCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'recommendation_category_id' => ['nullable'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
