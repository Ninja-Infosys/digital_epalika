<?php

namespace Modules\JudicialCommittee\Http\Requests\JudicialMember;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreJudicialMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('judicialMember_create');
    }

    public function rules(): array
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
            'status' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'नाम आवश्यक छ',
            'designation_id.required' => 'पद आवश्यक छ',
            'phone.required' => 'फोन आवश्यक छ',
            'province_id.required' => 'प्रदेश आवश्यक छ',
            'district_id.required' => 'जिल्ला आवश्यक छ',
            'local_body_id.required' => 'स्थानीय निकाय आवश्यक छ',
            'ward_no.required' => 'वार्ड नं आवश्यक छ',
            'gender.required' => 'लिङ्ग आवश्यक छ',
            'dob.required' => 'जन्म मिति आवश्यक छ',
            'en_dob.required' => 'जन्म मिति आवश्यक छ',
            'father_name.required' => 'बुबाको नाम आवश्यक छ',
            'mother_name.required' => 'आमाको नाम आवश्यक छ',
            'grandfather_name.required' => 'हजुरबुबाको नाम आवश्यक छ',
        ];
    }
}
