<?php

namespace Modules\Grant\Http\Requests\ThematicArea;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThematicAreaRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title'=>['required']
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'विषयगत क्षेत्र आवश्यक छ'
        ];
    }
}
