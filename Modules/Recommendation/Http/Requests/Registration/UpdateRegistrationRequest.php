<?php

namespace Modules\Recommendation\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRegistrationRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('recommendation_edit');
    }

    public function rules():array
    {
        return [
            'date_ne'=>['required'],
            'date_en'=>['required'],
            'application'=>['nullable','file'],
            'recommendation_data'=>['required'],
            'personal_detail_id'=>['nullable',Rule::exists('personal_details','id')->withoutTrashed()],
            'recommendation_category_id'=>['nullable',Rule::exists('recommendation_categories','id')->withoutTrashed()]
        ];
    }
}
