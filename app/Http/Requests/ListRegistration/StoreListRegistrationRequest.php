<?php

namespace App\Http\Requests\ListRegistration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreListRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('listRegistration_create');
    }

    public function rules(): array
    {
        return [
            'registration_no' => ['required', Rule::unique('list_registrations', 'registration_no')],
            'applicant_type' => ['required', Rule::in(config('defaults.applicant_types'))],
            'name' => ['nullable'],
            'address' => ['required'],
            'mailing_address' => ['required'],
            'main_person' => ['required'],
            'telephone' => ['nullable'],
            'mobile_no' => ['required'],
            'application_photo' => ['nullable', 'mimes:jpg,jpeg,png,pdf'],
            'registration_certificate' => ['nullable', 'mimes:jpg,jpeg,png,pdf'],
            'pan_photo' => ['nullable', 'mimes:jpg,jpeg,png,pdf'],
            'tax_payment_certificate' => ['nullable', 'mimes:jpg,jpeg,png,pdf'],
            'license_photo' => ['nullable', 'mimes:jpg,jpeg,png,pdf'],
            'date'=>['required'],
        ];
    }
}
