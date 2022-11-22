<?php

namespace Modules\Plan\Http\Requests\BudgetSource;

use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetSourceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'source_name' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'source_name.required' => 'स्रोत आवश्यक छ'
        ];
    }
}
