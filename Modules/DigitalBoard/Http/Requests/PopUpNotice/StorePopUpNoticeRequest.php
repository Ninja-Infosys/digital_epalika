<?php

namespace Modules\DigitalBoard\Http\Requests\PopUpNotice;

use Illuminate\Foundation\Http\FormRequest;

class StorePopUpNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'display_duration' => ['nullable','integer'],
            'iteration_duration' => ['nullable','integer'],
            'image' => ['nullable','mimes:png,jpeg,jpg'],
            'ward' => ['nullable', 'array'],
            'ward.*' => ['integer'],
            'is_displayed' => ['nullable', 'boolean'],
        ];
    }
}
