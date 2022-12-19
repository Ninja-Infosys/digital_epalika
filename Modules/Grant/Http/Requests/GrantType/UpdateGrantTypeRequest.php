<?php

namespace Modules\Grant\Http\Requests\GrantType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateGrantTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('grantType_edit');
    }

    public function rules(): array
    {
        return [
            'title'=>['required', 'string', 'max:255']
        ];
    }
}
