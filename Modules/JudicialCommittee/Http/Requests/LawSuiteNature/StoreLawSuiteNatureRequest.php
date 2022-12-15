<?php

namespace Modules\JudicialCommittee\Http\Requests\LawSuiteNature;

use Illuminate\Foundation\Http\FormRequest;

class StoreLawSuiteNatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'code' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ['शीर्षक आवश्यक छ'],
            'code.required' => ['कोड आवश्यक छ']
        ];
    }
}
