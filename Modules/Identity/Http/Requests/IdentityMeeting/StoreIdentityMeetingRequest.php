<?php

namespace Modules\Identity\Http\Requests\IdentityMeeting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreIdentityMeetingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'date_bs' => ['required'],
            'date_ad' => ['required', 'date'],
            'description' => ['nullable'],
            'committees' => ['required', 'array'],
            'committees.*' => [Rule::exists('disability_committees', 'id')->withoutTrashed()],
            'disabilityIdentityCards' => ['required', 'array'],
            'disabilityIdentityCards.*.id' => ['nullable', Rule::exists('disability_identity_cards', 'id')->withoutTrashed()],
            'disabilityIdentityCards.*.governmental_disability_type_id' => ['required_with:disabilityIdentityCards.*.id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'बैठकको शिर्षक आवश्यक छ',
            'title.date_bs' => 'बैठकको मिति आवश्यक छ',
            'disabilityIdentityCards.*.governmental_disability_type_id' => 'अपाङ्गताको प्रकार आवश्यक छ',
        ];
    }
}
