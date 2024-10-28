<?php

namespace Modules\Recommendation\Http\Requests\RecommendationDocument;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Modules\Recommendation\Entities\RecommendationDocument;

class StoreRecommendationDocumentRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('recommendation_document_access');
    }

    public function rules():array
    {
        return [
            'title'=>['required',Rule::unique(RecommendationDocument::class,'title')->withoutTrashed()]
        ];
    }
}
