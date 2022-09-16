<?php

namespace Modules\DigitalBoard\Http\Requests\Employee;

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
            'email' => ['nullable', Rule::unique('employees', 'email')->withoutTrashed()],
            'phone' => ['nullable', Rule::unique('employees', 'phone')->withoutTrashed()],
            'position' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
