<?php

namespace Modules\Grant\Http\Requests\Enterprises;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreEnterprisesRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('enterprise_create');
    }

    public function rules():array
    {
        return [
            'enterprise_type_id' => ['required', Rule::exists('enterprise_types', 'id')->withoutTrashed()],
            'name' => ['required', 'string', 'max:255'],
            'vat_pan' => ['nullable'],
            'province_id' => ['required', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['required', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
