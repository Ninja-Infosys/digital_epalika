<?php

namespace App\Http\Requests\Admin\Settings\Ethnicity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEthnicityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>['required','string','max:255']
        ];
    }
}
