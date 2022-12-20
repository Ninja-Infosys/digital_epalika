<?php

namespace Modules\Grant\Http\Requests\Group;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateGroupRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('cooperativeType_edit');
    }

    public function rules():array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'registration_date' => ['required', 'date'],
            'registered_office' => ['required'],
            'monthly_meeting' => ['nullable'],
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
