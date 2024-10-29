<?php

namespace Modules\Recommendation\Http\Requests\RecommendationSignature;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRecommendationSignatureRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('recommendation_signature_edit');
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
