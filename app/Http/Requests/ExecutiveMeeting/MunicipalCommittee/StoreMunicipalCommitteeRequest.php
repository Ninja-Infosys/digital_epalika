<?php

namespace App\Http\Requests\ExecutiveMeeting\MunicipalCommittee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMunicipalCommitteeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('executiveCommittee_create');
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

    public function messages()
    {
        return [
            'name.required' => 'नाम आवश्यक छ।',
            'designation.required' => 'पद आवश्यक छ।',
            'phone.required' => 'फोन आवश्यक छ।',
            'phone.image' => 'फोटोमा  हुनुपर्छ',
            'email.email' => 'इमेल फर्म हुनुपर्छ',
            'word_no.integer' => 'वार्ड न. अंकमा हुनुपर्छ ',
            'position.integer' => 'स्थिति अंकमा हुनुपर्छ '
        ];
    }
}
