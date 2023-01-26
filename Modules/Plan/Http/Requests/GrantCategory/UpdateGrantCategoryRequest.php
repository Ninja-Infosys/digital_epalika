<?php

namespace Modules\Plan\Http\Requests\GrantCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGrantCategoryRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('grant_categories', 'title')->withoutTrashed()->ignore($this->grantCategory)]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'शीर्षक आवश्यक छ'
        ];
    }
}
