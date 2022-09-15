<?php

namespace Modules\Circular\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('registration_edit');
    }

    public function rules(): array
    {
        return [
            'registration_no' => ['required', Rule::unique('registrations', 'registration_no')->withoutTrashed()->ignore($this->registration)],
            'registration_date' => ['required'],
            'letter_number' => ['required'],
            'letter_date' => ['required'],
            'sender_name' => ['required'],
            'subject' => ['required'],
            'receiver_name' => ['required'],
            'phone' => ['required'],
            'signature_image' => ['nullable', 'image'],
            'date' => ['required'],
            'remarks' => ['nullable'],
            'circularDocuments' => ['nullable', 'array'],
            'circularDocuments.*' => ['mimes:jpg,png,jpeg,pdf']
        ];
    }
}
