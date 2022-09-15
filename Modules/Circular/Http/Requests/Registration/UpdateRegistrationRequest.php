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

    public function messages()
    {
        return[
            'registration_no.required'=>'दर्ता नं अनिबार्य छ।',
            'registration_no.unique'=>'दर्ता नं पहिले नै लिइएको छ।',
            'registration_date.required'=>'दर्ता मिति अनिबार्य छ।',
            'letter_number.required'=>'पत्र संख्या अनिबार्य छ।',
            'sender_name.required'=>'पठाउने कार्यालयको नाम अनिबार्य छ।',
            'subject.required'=>'बिषय अनिबार्य छ।',
            'receiver_name.required'=>'बुझिलिनेको नाम अनिबार्य छ।',
            'phone.required'=>'फोन अनिबार्य छ।',
            'date.required'=>'मिति अनिबार्य छ।',
            'circularDocuments.required'=>'कागजात अनिबार्य छ।',
            'signature_image.image'=>'हस्ताक्षर फोटो फर्ममा छ।',
            'circularDocuments.mimes'=>'फाइल अनिबार्य jpg, png, jpeg, pdf मा हुनुपर्छ।'
            ];
    }
}
