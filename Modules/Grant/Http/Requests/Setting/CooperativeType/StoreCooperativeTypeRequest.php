<?php

namespace Modules\Grant\Http\Requests\Setting\CooperativeType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

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
