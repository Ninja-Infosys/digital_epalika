<?php

namespace App\Http\Requests\UserManagement\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('user_create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','email',Rule::unique('users','email')->withoutTrashed()],
            'phone' => ['nullable','numeric',Rule::unique('users','phone')->withoutTrashed()],
            'role_id' => ['required',Rule::exists('roles','id')->withoutTrashed()],
            'password' => ['required','confirmed','min:7'],
        ];
    }
}
