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

    public function messages()
    {
        return[
            'name.required' => 'नाम अनिबार्य छ।',
            'name.string' => 'नाम अनिबार्य अक्षर् मा हुनुपर्छ।',
            'email.required' => 'इमेल फिल्ड अनिबार्य छ।',
            'email.unique' => 'इमेल पहिले नै लिइएको छ।',
            'phone.numeric' => 'फोन अङ्कमा छ ',
            'phone.unique' => 'फोन पहिले नै लिइएको छ।',
            'role_id.required' => 'भूमिका अनिबार्य छ।',
            'password.required' => 'पासवर्ड अनिबार्य छ।',
            'password.confirmed' => 'पासवर्डसंग मेल खाएन।',
            'password.min' => 'पासवर्ड न्युनतम ७ अक्षरको हुनुपर्छ ।',
            'ward_no.integer' => 'वार्ड न. अंकमा हुनुपर्छ ।'
        ];
    }
}
