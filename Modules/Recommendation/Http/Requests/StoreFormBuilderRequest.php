<?php

namespace Modules\Recommendation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class StoreFormBuilderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('formBuilder_create');
    }

    public function rules(): array
    {
        return [
            'form' => ['required', 'json'],
            'title' => ['nullable', 'string', 'max:255']
        ];
    }
}
