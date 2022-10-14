<?php

namespace Modules\ExecutiveMeeting\Http\Requests\WardMeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('wardMeeting_create');
    }

    public function rules(): array
    {
        return [
            'meeting_detail_id' => ['required', Rule::exists('meeting_details', 'id')->withoutTrashed()],
            'subject' => ['nullable', 'string'],
            'date' => ['nullable'],
            'description' => ['nullable'],
            'decision_file' => ['required', 'mimes:png,jpeg,jpg']
        ];
    }

    public function messages(): array
    {
        return [
            'meeting_detail_id.required' => 'वार्ड बैठक सूचना आईडी आवश्यक छ',
            'decision_file.required' => 'निर्णय फाइल आवश्यक छ',
            'decision_file.mimes' => 'निर्णय फाइल jpeg, png, jpeg मा हुनुपर्छ'
        ];
    }
}
