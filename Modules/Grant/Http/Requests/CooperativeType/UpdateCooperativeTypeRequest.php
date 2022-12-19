<?php

namespace Modules\Grant\Http\Requests\CooperativeType;

use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCooperativeTypeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('cooperativeType_edit');
    }

    public function rules():array
    {
        return [
            'title'=>['required', 'string', 'max:255']
        ];
    }
}
