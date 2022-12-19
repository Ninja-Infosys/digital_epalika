<?php

namespace App\Http\Requests\Setting\EmergencyNumber;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmergencyNumberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['required'],
            'title' => ['required'],
            'contact_no' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'प्रकार आबश्यक छ',
            'title.required' => 'शिर्षक आबस्यक छ',
            'contact_no.required' => 'सम्पर्क नं. आबश्यक छ'
        ];
    }
}
