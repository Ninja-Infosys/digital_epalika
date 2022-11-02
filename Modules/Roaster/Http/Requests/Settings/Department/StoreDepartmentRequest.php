<?php

namespace Modules\Roaster\Http\Requests\Settings\Department;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('departments', 'title')->withoutTrashed()],
        ];
    }
}
