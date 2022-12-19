<?php

namespace Modules\Grant\Http\Requests\CooperativeType;

use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCooperativeTypeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('cooperativeType_create');
    }

    public function rules():array
    {
        return [
            'title'=>['required', 'string', 'max:255']
        ];
    }
}
