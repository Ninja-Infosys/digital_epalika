<?php

namespace Modules\Grant\Http\Requests\ThematicArea;

use Illuminate\Foundation\Http\FormRequest;

class StoreThematicAreaRequest extends FormRequest
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
            'title.required'=>'बिषयगत क्षेत्र आबश्यक छ '
        ];
    }
}
