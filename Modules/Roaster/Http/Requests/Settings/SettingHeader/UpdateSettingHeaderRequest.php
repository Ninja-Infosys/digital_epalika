<?php

namespace App\Http\Requests\Admin\Settings\SettingHeader;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'color' => ['nullable'],
            'font_size' => ['required', 'string'],
            'font_family' => ['required', 'string'],
            'font' => ['required', 'string'],
            'position' => ['nullable', 'integer']
        ];
    }
}
