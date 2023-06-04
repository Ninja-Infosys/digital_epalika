<?php

namespace App\Http\Requests\Setting\Employee;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('employee_edit');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string'],
            'designation' => ['nullable', 'string'],
            'photo' => ['nullable', 'mimes:png,jpeg,jpg'],
            'email' => ['nullable', 'email', Rule::unique('employees', 'email')->withoutTrashed()->ignore($this->employee)],
            'phone' => ['nullable', Rule::unique('employees', 'phone')->withoutTrashed()->ignore($this->employee)],
            'position' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
            'is_employee' => ['required', 'boolean'],
            'is_dept_head' => ['nullable', 'boolean'],
            'branch_id' => ['required', Rule::exists('branches', 'id')->withoutTrashed()],
            'employee_id' => ['nullable', Rule::exists('employees', 'id')->withoutTrashed()],
            'show_to_mobile_app' => ['required', 'boolean'],
            'show_to_index' => ['required', 'boolean'],
            'gender' => ['required', new Enum(Gender::class)],
            'dob' => ['required'],
            'address' => ['required','string','max:255'],
            'ethnicity_id' => ['required_if:is_employee,1'],
            'pan_no' => ['required'],
            'pis_no' => ['required_if:is_employee,0'],
            'epf_no' => ['required_if:is_employee,0'],
            'cif_no' => ['required_if:is_employee,0'],
            'insurance_card_no' => ['required_if:is_employee,0'],
            'description' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'नाम अनिबार्य छ।',
            'photo.mimes' => 'फोटो अनिबार्य jpg, jpeg, png मा छ। ',
            'email.unique' => 'इमेल पहिले नै अवस्थित छ।',
            'phone.unique' => 'फोन पहिले नै अवस्थित छ।',
            'position.integer' => 'position पूर्णांक हुनुपर्छ',

        ];
    }
}
