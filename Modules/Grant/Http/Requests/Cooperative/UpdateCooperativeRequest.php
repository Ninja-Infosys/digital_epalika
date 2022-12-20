<?php

namespace Modules\Grant\Http\Requests\Cooperative;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCooperativeRequest extends FormRequest
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
