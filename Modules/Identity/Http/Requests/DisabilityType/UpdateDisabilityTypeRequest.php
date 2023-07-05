<?php

namespace Modules\Identity\Http\Requests\DisabilityType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateDisabilityTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('disabilityType_edit');
    }

    public function rules(): array
    {
        return [
            'title'=>['required','string','max:255'],
            'title_en'=>['required','string','max:255'],
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => ['शिर्षक आवश्यक छ'],
            'title_en.required' => ['शिर्षक अंग्रेजीमा आवश्यक छ'],
        ];
    }
}
