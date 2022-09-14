<?php

namespace App\Http\Requests\UserManagement\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('user_edit');
    }

    public function rules():array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','email',Rule::unique('users','email')->withoutTrashed()->ignore($this->user)],
            'phone' => ['nullable','numeric',Rule::unique('users','phone')->withoutTrashed()->ignore($this->user)],
            'role_id' => ['required',Rule::exists('roles','id')->withoutTrashed()],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'district_id' => ['nullable', Rule::exists('districts', 'id')],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['nullable', 'integer']
        ];
    }
}
