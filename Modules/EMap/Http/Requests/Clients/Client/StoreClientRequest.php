<?php

namespace Modules\EMap\Http\Requests\Clients\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCLientRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name' => ['required',],
            'province_id' => ['required', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['required',],
            'tole' => ['nullable'],
            'phone' => ['required'],
            'email' => ['nullable'],
        ];
    }
}
