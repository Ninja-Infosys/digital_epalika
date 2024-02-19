<?php

namespace Modules\Recommendation\Http\Requests\RecommendationDocument;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Recommendation\Entities\RecommendationDocument;

class StoreRecommendationDocumentRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title'=>['required',Rule::unique(RecommendationDocument::class,'title')->withoutTrashed()]
        ];
    }
}
