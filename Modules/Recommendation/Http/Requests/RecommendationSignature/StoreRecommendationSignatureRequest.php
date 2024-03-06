<?php

namespace Modules\Recommendation\Http\Requests\RecommendationSignature;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecommendationSignatureRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
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
