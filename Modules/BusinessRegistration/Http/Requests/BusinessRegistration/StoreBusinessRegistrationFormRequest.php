<?php

namespace Modules\BusinessRegistration\Http\Requests\BusinessRegistration;

use App\Enums\Gender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\BusinessRegistration\Enums\Qualification;

class StoreBusinessRegistrationFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'business_nature_id' => ['required', Rule::exists('business_natures', 'id')->withoutTrashed()],
            'name' => ['required'],
            'name_en' => ['required'],
            'address' => ['required'],
            'address_en' => ['required'],
            'purpose' => ['required'],
            'province_id' => ['nullable', Rule::exists('provinces', 'id')->withoutTrashed()],
            'district_id ' => ['nullable', Rule::exists('districts', 'id')->withoutTrashed()],
            'local_body_id' => ['nullable', Rule::exists('local_bodies', 'id')->withoutTrashed()],
            'tole' => ['required'],
            'ward_no' => ['nullable'],
            'way' => ['nullable'],
            'working_capital' => ['nullable'],
            'fixed_capital' => ['nullable'],
            'investment' => ['required'],
            'is_rent' => ['nullable'],
            'house_owner_name' => ['nullable'],
            'house_owner_phone' => ['nullable'],
            'house_owner_address' => ['nullable'],
            'house_owner_monthly_rent' => ['nullable'],
            'length' => ['required'],
            'width' => ['nullable'],
            'application_date' => ['required'],
            'application_date_en' => ['required'],
            'rent_agreement' => ['nullable'],
            'land_ownership_certificate' => ['nullable'],
            'ward_recommendation' => ['required'],
            'embassy_document' => ['nullable'],
            'license' => ['nullable'],
            'registration_document' => ['nullable'],
            'tax_document' => ['nullable'],
            'other' => ['nullable'],
            'partners' => ['required', 'array'],
            'partners.*.name' => ['required'],
            'partners.*name_en' => ['required'],
            'partners.*citizenship_no' => ['required'],
            'partners.*issue_date' => ['required'],
            'partners.*issue_district_id' => ['required', Rule::exists('districts', 'id')],
            'partners.*phone' => ['required'],
            'partners.*email' => ['nullable'],
            'partners.*province_id' => ['nullable'],
            'partners.*district_id' => ['nullable'],
            'partners.*local_body_id' => ['nullable'],
            'partners.*ward_no' => ['nullable'],
            'partners.*way' => ['nullable'],
            'partners.*tole' => ['nullable'],
            'partners.*house_no' => ['required'],
            'partners.*account_no' => ['nullable'],
            'partners.*national_card_no' => ['nullable'],
            'partners.*gender' => ['required', new Enum(Gender::class)],
            'partners.*education_qualification' => ['required', new Enum(Qualification::class)],
            'partners.*father_name' => ['required'],
            'partners.*grandfather_name' => ['required'],
            'partners.*photo' => ['nullable'],
            'partners.*signature' => ['nullable'],
            'partners.*citizenship_front' => ['nullable'],
            'partners.*citizenship_back' => ['nullable'],
            'partners.*position' => ['required'],



        ];
    }
}
