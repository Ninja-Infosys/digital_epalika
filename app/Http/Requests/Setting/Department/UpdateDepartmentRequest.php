<?php

namespace App\Http\Requests\Setting\Department;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('departments', 'title')->ignore($this->department)->withoutTrashed()],
        ];
    }
}
