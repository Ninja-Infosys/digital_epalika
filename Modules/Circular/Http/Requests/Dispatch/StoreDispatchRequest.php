<?php

namespace Modules\Circular\Http\Requests\Dispatch;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDispatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('dispatch_create');
    }

    public function rules(): array
    {
        return [
            'dispatch_no' => ['required', Rule::unique('dispatches', 'dispatch_no')->withoutTrashed()],
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
            'documents' => ['required', 'array'],
            'documents.*' => ['mimes:jpg,jpeg,png,pdf']
        ];
    }

    public function messages()
    {
        return [
          'dispatch_no.required'=>'',
          'dispatch_date.required'=>'',
          'letter_number.required'=>'',
          'letter_date.required'=>'',
          'subject.required'=>'',
          'receiver_name.required'=>'',
          'receiver_address.required'=>'',
          'receiver_contact.required'=>'',
          'dispatch_no.required'=>'',
          'dispatch_no.required'=>'',
        ];
    }
}
