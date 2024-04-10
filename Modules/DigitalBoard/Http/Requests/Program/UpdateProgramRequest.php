<?php

namespace Modules\DigitalBoard\Http\Requests\Program;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'date' => ['required','date_format:Y-m-d'],
            'image' => ['nullable','mimes:png,jpeg,jpg'],
            'ward' => ['nullable', 'array'],
            'ward.*' => ['string'],
            'is_displayed' => ['nullable', 'boolean'],
        ];
    }
}
