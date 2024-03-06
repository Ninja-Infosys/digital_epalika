<?php

namespace Modules\Recommendation\Http\Requests\RecommendationSignature;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecommendationSignatureRequest extends FormRequest
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
            'signature'=>['nullable','mimes:png,jpeg,jpg'],
            'status'=>['nullable','boolean'],
        ];
    }
}
