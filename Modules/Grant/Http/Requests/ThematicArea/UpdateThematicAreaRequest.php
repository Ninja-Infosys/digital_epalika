<?php

namespace Modules\Grant\Http\Requests\ThematicArea;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateThematicAreaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required',Rule::unique('thematic_areas','title')->withoutTrashed()->ignore($this->thematicArea)]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'विषयगत क्षेत्र आवश्यक छ',
            'title.unique' => 'शीर्षक पहिले नै लिइएको छ',
        ];
    }
}
