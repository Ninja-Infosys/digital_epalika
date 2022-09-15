<?php

namespace Modules\Circular\Http\Requests\Dispatch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDispatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('dispatch_edit');
    }

    public function rules(): array
    {
        return [
            'dispatch_no' => ['required', Rule::unique('dispatches', 'dispatch_no')->withoutTrashed()->ignore($this->dispatch)],
            'dispatch_date' => ['required'],
            'letter_number' => ['required'],
            'letter_date' => ['required'],
            'subject' => ['required', 'max:255'],
            'receiver_name' => ['required', 'max:255'],
            'receiver_address' => ['required', 'max:255'],
            'receiver_contact' => ['required'],
            'receiver_signature' => ['nullable', 'image'],
            'date' => ['required'],
            'remarks' => ['nullable'],
            'documents' => ['nullable', 'array'],
            'documents.*' => ['mimes:jpg,jpeg,png,pdf']
        ];
    }
}
