<?php

namespace Modules\OrganizationRegistration\Http\Requests\Institution;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstitutionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'registration_date' => ['required'],
            'registration_date_en' => ['required', 'date'],
            'name' => ['required', 'string', 'max:255'],
            'institution_address' => ['required', 'string', 'max:255'],
            'contact_no' => ['required'],
            'email' => ['required', 'email'],
            'dao_registration_no' => ['required', 'numeric'],
            'dao_registration_date' => ['required'],
            'dao_registration_date_en' => ['required', 'date'],
            'swc_registration_no' => ['required', 'numeric'],
            'swc_registration_date' => ['required'],
            'swc_registration_date_en' => ['required', 'date'],
            'pan_vat' => ['required'],
            'objective' => ['required'],
            'area' => ['required'],
            'minute' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
            'application' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
            'Legislation' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
            'Ward_recommendation' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
            'stamp' => ['required', 'mimes:jpg,png,pdf,jpeg,doc'],
            'proposed_person' => ['required', 'string', 'max:255'],
            'supervisor_person' => ['required', 'string', 'max:255'],
            'approval_person' => ['required', 'string', 'max:255'],
            'proposed_person_designation' => ['required', 'string', 'max:255'],
            'supervisor_person_designation' => ['required', 'string', 'max:255'],
            'approval_person_designation' => ['required', 'string', 'max:255'],
        ];
    }
}
