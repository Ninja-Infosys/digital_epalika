<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMeetingDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('meetingDecision_edit');
    }

    public function rules(): array
    {
        return [
            'meeting_id' => ['required', Rule::exists('meetings', 'id')->withoutTrashed()],
            'subject' => ['required', 'string', 'max:255'],
            'date' => ['nullable'],
            'en_date' => ['required'],
            'description' => ['nullable'],
            'decision_file' => ['nullable', 'mimes:jpg,png,jpeg,pdf']
        ];
    }
}
