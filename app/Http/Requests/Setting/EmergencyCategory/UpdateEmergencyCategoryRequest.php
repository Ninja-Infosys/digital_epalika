<?php

namespace App\Http\Requests\Setting\EmergencyCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateEmergencyCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'शिर्षक आबस्यक छ',
        ];
    }
}
