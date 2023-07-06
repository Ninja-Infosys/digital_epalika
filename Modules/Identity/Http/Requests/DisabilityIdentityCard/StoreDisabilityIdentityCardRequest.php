<?php

namespace Modules\Identity\Http\Requests\DisabilityIdentityCard;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreDisabilityIdentityCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'photo' => ['nullable'],
            'name' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'citizenship_no' => ['required', Rule::unique('disability_identity_cards', 'citizenship_no')->withoutTrashed()],
            'birth_registration_no' => ['nullable', Rule::unique('disability_identity_cards', 'birth_registration_no')->withoutTrashed()],
            'father_name' => ['required', 'string', 'max:255'],
            'father_name_en' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_name_en' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'gender' => ['required', new Enum(Gender::class)],
            'province_id' => ['required', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id' => ['required', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['required', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'ward_no' => ['required', 'integer'],
            'tole' => ['required', 'string', 'max:255'],
            'disability_type_id' => ['required', Rule::exists('disability_types', 'id')->withoutTrashed()],
            'guardian_name' => ['required', 'string', 'max:255'],
            'guardian_name_en' => ['required', 'string', 'max:255'],
            'relationship_id' => ['required', Rule::exists('relationships', 'id')->withoutTrashed()],
            'phone' => ['required'],
        ];
    }
}
