<?php

namespace App\Http\Requests\OfficeSetting;

use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOfficeSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('officeSetting_edit');
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'site_address' => ['nullable', 'string'],
            'logo' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
            'logo1' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
            'logo2' => ['nullable', 'mimes:png,jpg,jpeg,gif'],
            'background_image' => ['nullable', 'mimes:png,jpg,jpeg'],
            'phone' => ['nullable'],
            'email' => ['nullable'],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['nullable', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'fiscal_year_id' => ['nullable', Rule::exists('fiscal_years', 'id')->withoutTrashed()],
            'ward_no' => ['nullable'],
            'google_map' => ['nullable'],
            'introduction' => ['nullable'],
            'website' => ['nullable', 'url'],
            'facebook_link' => ['nullable', 'url'],

        ];
    }
}
