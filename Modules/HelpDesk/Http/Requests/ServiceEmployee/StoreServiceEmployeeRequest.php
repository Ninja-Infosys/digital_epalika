<?php

namespace Modules\HelpDesk\Http\Requests\ServiceEmployee;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_name' => ['required'],
            'photo' => ['nullable', 'image'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable'],
            'designation' => ['required'],
            'position' => ['nullable', 'integer'],
        ];
    }
}
