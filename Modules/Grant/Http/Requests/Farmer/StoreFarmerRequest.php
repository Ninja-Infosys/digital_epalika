<?php

namespace Modules\Grant\Http\Requests\Farmer;

use App\Enums\Gender;
use App\Enums\MaritalStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreFarmerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('farmer_create');
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
            'gender' => ['required', new Enum(Gender::class)],
            'marital_status' => ['required', new Enum(MaritalStatusEnum::class)],
            'spouse_name' => ['nullable'],
            'father_name' => ['required', 'string', 'max:255'],
            'grandfather_name' => ['required', 'string', 'max:255'],
            'citizenship_no' => ['required', Rule::unique('farmers', 'citizenship_no')->withoutTrashed()],
            'farmer_id_card_no' => ['nullable', Rule::unique('farmers', 'farmer_id_card_no')->withoutTrashed()],
            'national_id_card_no' => ['nullable', Rule::unique('farmers', 'national_id_card_no')->withoutTrashed()],
            'phone_no' => ['required', Rule::unique('farmers', 'phone_no')->withoutTrashed()],
            'province_id' => ['required', Rule::exists('provinces', 'id')],
            'district_id' => ['required', Rule::exists('districts', 'id')],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')],
            'ward_no' => ['required', 'integer'],
            'village' => ['nullable'],
            'tole' => ['nullable'],
            'groups' => ['nullable', 'array'],
            'groups.*' => [Rule::exists('groups', 'id')->withoutTrashed()],
            'enterprises' => ['nullable', 'array'],
            'enterprises.*' => [Rule::exists('enterprises', 'id')->withoutTrashed()],
            'cooperatives' => ['nullable', 'array'],
            'cooperatives.*' => [Rule::exists('cooperatives', 'id')->withoutTrashed()],
        ];
    }
}
