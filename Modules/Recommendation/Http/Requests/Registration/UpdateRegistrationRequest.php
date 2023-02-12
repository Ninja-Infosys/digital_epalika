<?php

namespace Modules\Recommendation\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRegistrationRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'date_ne'=>['required'],
            'date_en'=>['required'],
            'application'=>['required','image'],
            'recommendation'=>['required'],
            'recommendation_data'=>['required'],
            'personal_detail_id'=>['nullable',Rule::exists('personal_details','id')->withoutTrashed()],
            'recommendation_category_id'=>['nullable',Rule::exists('recommendation_categories','id')->withoutTrashed()]
        ];
    }
}
