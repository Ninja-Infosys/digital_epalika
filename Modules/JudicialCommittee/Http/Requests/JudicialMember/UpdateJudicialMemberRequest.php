<?php

namespace Modules\JudicialCommittee\Http\Requests\JudicialMember;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJudicialMemberRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
            'position' => ['nullable', 'integer'],
            'designation_id' => ['required', Rule::exists('designations', 'id')->withoutTrashed()],
            'phone' => ['required'],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' => ['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['required', 'integer'],
            'tole' => ['nullable'],
            'gender' => ['required'],
            'dob' => ['required'],
            'en_dob' => ['required', 'date'],
            'blood_group' => ['nullable'],
            'father_name' => ['required'],
            'mother_name' => ['required'],
            'grandfather_name' => ['required'],
            'status' => ['nullable', 'boolean']
        ];
    }
}
