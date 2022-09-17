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
}
