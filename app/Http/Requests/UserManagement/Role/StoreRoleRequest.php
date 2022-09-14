<?php

namespace App\Http\Requests\UserManagement\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', Rule::unique('roles', 'title')->withoutTrashed()],
            'permissions' => ['required', 'array'],
            'permissions.*' => [Rule::exists('permissions', 'id')]
        ];
    }
}
