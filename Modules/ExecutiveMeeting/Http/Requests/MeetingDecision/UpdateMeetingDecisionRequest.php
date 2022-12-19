<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMeetingDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'meeting_event_id' => ['required', Rule::exists('meeting_events', 'id')->withoutTrashed()],
            'subject' => ['nullable', 'string'],
            'date' => ['nullable'],
            'description' => ['nullable'],
            'decision_file' => ['nullable', 'mimes:png,jpeg,jpg'],
        ];
    }

    public function messages(): array
    {
        return [
            'meeting_event_id.required' => 'बैठक आवश्यक छ',
            'decision_file.mimes' => 'निर्णय फाइल अनिबार्य png, jpeg, jpg मा हुनुपर्छ ',
        ];
    }
}
