<?php

namespace Modules\BusinessRegistration\Http\Requests\BusinessPurpose;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessPurposeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
        ];
    }
}
