<?php

namespace App\Http\Requests\ExecutiveMeeting\WardCommittee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreWardCommitteeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('executiveCommittee_create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'photo' => ['nullable', 'mimes:png,jpg,jpeg'],
            'email' => ['nullable', 'email'],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['nullable', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['nullable', 'integer'],
            'village' => ['nullable', 'string'],
            'tole' => ['nullable', 'string'],
            'position' => ['nullable', 'integer']
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'नाम आवश्यक छ',
            'designation.required' => 'पद आवश्यक छ',
            'phone.required' => 'फोन आवश्यक छ',
            'photo.mimes' => 'फोटो अनिबार्य jpg, png, jpeg मा हुनुपर्छ ',
            'email.email' => 'इमेल फर्ममा हुनुपर्छ ',
            'ward_no' => 'वार्ड न. अंकमा हुनुपर्छ ',
            'position.integer' => 'स्थिति अंकमा हुनुपर्छ '
        ];
    }
}
