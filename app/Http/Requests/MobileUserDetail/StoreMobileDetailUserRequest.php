<?php

namespace App\Http\Requests\MobileUserDetail;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreMobileDetailUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mobileUserDetail.citizenship_no' => ['nullable','string'],
            'mobileUserDetail.nec_no' => ['nullable'],
            'mobileUserDetail.citizenship_issued_date' => ['nullable','date'],
            'mobileUserDetail.mobile_user_id' => ['nullable', Rule::exists('mobile_users', 'id')->withoutTrashed()],
            'mobileUserDetail.province_id' => ['nullable', Rule::exists('provinces', 'id')->withoutTrashed()],
            'mobileUserDetail.district_id' => ['nullable', Rule::exists('districts', 'id')->withoutTrashed()],
            'mobileUserDetail.local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'mobileUserDetail.ward_no' => ['nullable','numeric'],
            'mobileUserDetail.tole' => ['nullable','string'],
            'mobileUserDetail.temporary_province_id' => ['nullable', Rule::exists('provinces', 'id')->withoutTrashed()],
            'mobileUserDetail.temporary_district_id' => ['nullable', Rule::exists('districts', 'id')->withoutTrashed()],
            'mobileUserDetail.temporary_local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'mobileUserDetail.temporary_ward' => ['nullable','numeric'],
            'mobileUserDetail.temporary_tole' => ['nullable','string'],
            'mobileUserDetail.citizenship_front' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'mobileUserDetail.nec_certificate' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'mobileUserDetail.citizenship_back' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'mobileUserDetail.nec_certificate' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'mobileUserDetail.is_minor' => ['nullable', 'boolean'],
            'mobileUserDetail.gender' => ['nullable', new Enum(Gender::class)],
            'mobileUserDetail.birth_registration_no' => ['nullable','string'],
            'mobileUserDetail.citizenship_issued_district' => ['nullable',Rule::exists('districts', 'id')->withoutTrashed()],
            'name' => ['required','string'],
            'email' => ['required', 'email', Rule::unique('mobile_users', 'email')->ignore($this->mobileUser)],
            'phone' => ['required', 'regex:/^(?:\+?9779\d{9}|9\d{9})$/', Rule::unique('mobile_users', 'phone')->ignore($this->mobileUser)],
            'avatar' => ['nullable','image', 'mimes:png,jpg,jpeg'],




        ];
    }
}
