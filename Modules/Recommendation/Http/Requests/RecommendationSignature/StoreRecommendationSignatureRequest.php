<?php

namespace Modules\Recommendation\Http\Requests\RecommendationSignature;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreRecommendationSignatureRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('recommendation_signature_access');
    }

    public function rules():array
    {
        return [
            'full_name'=>['required'],
            'position'=>['required'],
            'signature'=>['required','mimes:png,jpeg,jpg'],
            'status'=>['nullable','boolean'],
        ];
    }
}
