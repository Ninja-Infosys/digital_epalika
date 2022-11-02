<?php

namespace Modules\Grant\Http\Requests\GrantType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGrantTypeRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title'=>['required', Rule::unique('grant_types', 'title')->withoutTrashed()]
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'अनुदान प्रकार आवश्यक छ',
            'title.unique'=>'अनुदान प्रकार अद्वितीय छ'
        ];
    }
}
