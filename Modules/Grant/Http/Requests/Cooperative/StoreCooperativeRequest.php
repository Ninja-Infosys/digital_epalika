<?php

namespace Modules\Grant\Http\Requests\Cooperative;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCooperativeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'cooperative_type_id' => ['required', Rule::exists('cooperative_types', 'id')->withoutTrashed()],
            'registration_no' => ['required', Rule::unique('cooperatives', 'registration_no')->withoutTrashed()],
            'registration_date' => ['required', 'date'],
            'vat_pan' => ['nullable'],
            'objective' => ['required'],
            'affiliation_id' => ['nullable', Rule::exists('affiliations', 'id')->withoutTrashed()],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' => ['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['required', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'farmers' => ['nullable', 'array'],
            'farmers.*' => [Rule::exists('farmers', 'id')->withoutTrashed()],
        ];
    }
}
