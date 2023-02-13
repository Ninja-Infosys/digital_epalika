<?php

namespace Modules\Recommendation\Http\Requests\PersonalDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonalDetailRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name' => ['required','string'],
            'phone_no' => ['required', 'string'],
            'is_minor' => ['nullable','boolean'],
            'citizenship_no' => ['required', 'string'],
            'gender' => ['required','string'],
            'province_id' =>['required', Rule::exists('provinces','id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts','id')->withoutTrashed()],
            'local_body_id' => ['required',Rule::exists('local_bodies','id')->withoutTrashed()],
            'ward_no' => ['required','integer'],
            'tole' => ['required','string']
        ];
    }
}
