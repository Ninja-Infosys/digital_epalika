<?php

namespace Modules\Grant\Http\Requests\Setting\EnterpriseType;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnterpriseTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'शीर्षक आवश्यक छ'
        ];
    }
}
