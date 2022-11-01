<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'trainer_permission' => ['required'],
            'fiscal_year_id' => ['required', Rule::exists('fiscal_years', 'id')]
        ];
    }
}
