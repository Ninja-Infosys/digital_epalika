<?php

namespace App\Http\Requests\ExecutiveMeeting\MunicipalCommittee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMunicipalCommitteeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'designation' => ['required'],
            'phone' => ['required'],
            'photo' => ['nullable', 'image'],
            'email' => ['nullable', 'email'],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')],
            'district_id' => ['nullable', Rule::exists('districts', 'id')],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['nullable', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'position' => ['nullable', 'integer']
        ];
    }
}
