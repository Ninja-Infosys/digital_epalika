<?php

namespace App\Http\Requests\Setting\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('employee_create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string'],
            'designation' => ['nullable', 'string'],
            'photo' => ['nullable', 'mimes:png,jpeg,jpg'],
            'email' => ['nullable', 'email', Rule::unique('employees', 'email')->withoutTrashed()],
            'phone' => ['nullable', Rule::unique('employees', 'phone')->withoutTrashed()],
            'position' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
            'is_employee' => ['required', 'boolean'],
            'is_dept_head' => ['nullable', 'boolean'],
            'branch_id' => ['required', Rule::exists('branches', 'id')->withoutTrashed()],
            'employee_id' => ['nullable', Rule::exists('employees', 'id')->withoutTrashed()],
            'show_to_mobile_app' => ['required', 'boolean'],
            'show_to_index' => ['required', 'boolean'],
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
