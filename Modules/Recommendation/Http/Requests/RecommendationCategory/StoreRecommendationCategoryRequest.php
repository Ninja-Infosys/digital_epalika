<?php

namespace Modules\Recommendation\Http\Requests\RecommendationCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRecommendationCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('recommendationCategory_create');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('recommendation_categories','title')->withoutTrashed()],
            'recommendation_category_id' => ['nullable',Rule::exists('recommendation_categories', 'id')->withoutTrashed()],
        ];
    }
}
