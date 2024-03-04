<?php

namespace Modules\Recommendation\Http\Requests\RecommendationCreate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecommendationCreateRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
