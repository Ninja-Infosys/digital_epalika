<?php

namespace App\Http\Requests\Admin\MobileUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMobileUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('mobile_users', 'email')->withoutTrashed()->ignore($this->mobileUserDetail)],
            'phone' => ['nullable', 'regex:/^(?:\+?9779\d{9}|9\d{9})$/', Rule::unique('mobile_users', 'phone')->withoutTrashed()->ignore($this->mobileUserDetail)],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' => ['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['required'],
            'tole' => ['required'],
        ];
    }
}
