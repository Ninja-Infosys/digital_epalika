<?php

namespace Modules\Grant\Http\Requests\GrantType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGrantTypeRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
