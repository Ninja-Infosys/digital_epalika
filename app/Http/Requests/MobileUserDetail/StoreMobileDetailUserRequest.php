<?php

namespace App\Http\Requests\MobileUserDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMobileDetailUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'citizenship_no' => ['nullable'],
            'nec_no' => ['nullable'],
            'citizenship_issued_date' => ['nullable','date'],
            'mobile_user_id' => ['nullable', Rule::exists('mobile_users', 'id')->withoutTrashed()],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['nullable', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['nullable','numeric'],
            'tole' => ['nullable','string'],
            'temporary_province_id' => ['nullable', Rule::exists('provinces', 'id')->withoutTrashed()],
            'temporary_district_id' => ['nullable', Rule::exists('districts', 'id')->withoutTrashed()],
            'temporary_local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'temporary_ward' => ['nullable','numeric'],
            'temporary_tole' => ['nullable','string'],
            'citizenship_front' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'nec_certificate' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'citizenship_back' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'nec_certificate' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'citizenship_issued_district' => ['nullable',Rule::exists('districts', 'id')->withoutTrashed()],
            'mobileUser.name' => ['nullable','string'],
            'mobileUser.email' => ['nullable','email'],
            'mobileUser.phone' => ['nullable','integer'],
            'mobileUser.avatar' => ['nullable','image', 'mimes:png,jpg,jpeg'],

        ];
    }
}
