<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUnitRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'measurement_unit_id' => ['required', Rule::exists('measurement_units', 'id')->withoutTrashed()],
            'title' => ['required'],
            'position' => ['nullable', 'integer'],
            'is_smallest' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return[
          'measurement_unit_id.required'=>'एकाइ मापन आवश्यक छ',
            'title.required'=>'शिर्षक अनिबार्य छ '
        ];
    }
}
