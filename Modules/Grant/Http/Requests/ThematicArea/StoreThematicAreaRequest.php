<?php

namespace Modules\Grant\Http\Requests\ThematicArea;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreThematicAreaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required',Rule::unique('thematic_areas','title')->withoutTrashed()]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'बिषयगत क्षेत्र आबश्यक छ ',
            'title.unique' => 'शीर्षक पहिले नै लिइएको छ',
        ];
    }
}
