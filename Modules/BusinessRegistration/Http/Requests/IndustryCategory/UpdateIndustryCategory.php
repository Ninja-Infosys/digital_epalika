<?php

namespace Modules\BusinessRegistration\Http\Requests\IndustryCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIndustryCategory extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title' => ['required', 'string']
        ];
    }
}
