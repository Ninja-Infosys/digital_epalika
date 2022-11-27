<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMeetingDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'meeting_event_id' => ['required', Rule::exists('meeting_events', 'id')->withoutTrashed()],
            'subject' => ['required', 'string'],
            'date' => ['required'],
            'en_date' => ['nullable', 'date'],
            'description' => ['nullable'],
            'decision_file' => ['required', 'mimes:png,jpeg,jpg'],
        ];
    }

    public function messages(): array
    {
        return [
            'meeting_event_id.required' => 'बैठक आवश्यक छ',
            'decision_file.required' => 'निर्णय फाइल आवश्यक छ',
            'decision_file.mimes' => 'फाइल png, jpeg, jpg मा हुनुपर्छ ',
        ];
    }
}
