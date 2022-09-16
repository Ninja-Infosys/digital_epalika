<?php

namespace Modules\DigitalBoard\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('employee_edit');
    }

    public function rules():array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string'],
            'designation' => ['nullable', 'string'],
            'photo' => ['nullable', 'mimes:png,jpeg,jpg'],
            'email' => ['nullable', Rule::unique('employees', 'email')->withoutTrashed()->ignore($this->employee)],
            'phone' => ['nullable', Rule::unique('employees', 'phone')->withoutTrashed()->ignore($this->employee)],
            'position' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
