<?php

namespace Modules\Grant\Http\Requests\Grant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGrantRequest extends FormRequest
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
