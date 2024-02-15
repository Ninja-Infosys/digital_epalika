<?php

namespace Modules\Recommendation\Http\Requests\RecommendationDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Recommendation\Enums\RecommendationTypeEnum;

class StoreRecommendationDetailRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'recommendation_category_id'=>['required',Rule::exists('recommendation_categories','id')->withoutTrashed()],
            'title'=>['required','string','max:255'],
            'title_en'=>['required','string','max:255'],
            'type'=>['required',new Enum(RecommendationTypeEnum::class)],
            'service_cost'=>['required','numeric'],
            'general_time'=>['required','integer'],
            'surrogate_time'=>['required','integer'],
            'is_citizenship_required'=>['nullable','boolean'],
            'is_applicable_org'=>['nullable','boolean'],
            'is_applicant_self'=>['nullable','boolean'],
            'is_permission_required'=>['nullable','boolean'],
            'is_taxcode_required'=>['nullable','boolean'],
            'add_land_diff_locations'=>['nullable','boolean'],
            'is_applicable_on_recommendation'=>['nullable','boolean'],
            'order'=>['required','integer'],
            'status'=>['nullable','boolean'],
            'description'=>['required'],
            'revenueHeaders'=>['required','array'],
            'revenueHeaders.*'=>['required',Rule::exists('revenue_headers','id')->withoutTrashed()],
            'recommendationDocuments'=>['required','array'],
            'recommendationDocuments.*'=>['required',Rule::exists('recommendation_documents','id')->withoutTrashed()],
        ];
    }
}
