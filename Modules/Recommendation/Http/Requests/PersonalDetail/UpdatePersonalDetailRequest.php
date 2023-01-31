<?php

namespace Modules\Recommendation\Http\Requests\PersonalDetail;

use Illuminate\Foundation\Http\FormRequest;

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
            'province_id' =>['required', 'integer'],
            'district_id' => ['required','integer'],
            'local_body_id' => ['required','integer'],
            'ward_no' => ['required','integer'],
            'tole' => ['required','string']
        ];
    }
}
