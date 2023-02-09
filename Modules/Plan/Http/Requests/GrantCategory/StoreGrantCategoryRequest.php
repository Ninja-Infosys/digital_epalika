<?php

namespace Modules\Plan\Http\Requests\GrantCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGrantCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('grant_categories', 'title')->withoutTrashed()]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'शीर्षक आवश्यक छ'
        ];
    }
}
