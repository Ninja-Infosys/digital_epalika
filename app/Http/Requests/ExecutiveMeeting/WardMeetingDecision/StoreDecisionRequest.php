<?php

namespace App\Http\Requests\ExecutiveMeeting\WardMeetingDecision;

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
            'ward_meeting_notice_id' => ['required', Rule::exists('ward_meeting_notices', 'id')->withoutTrashed()],
            'subject' => ['nullable', 'string'],
            'date' => ['nullable'],
            'description' => ['nullable'],
            'decision_file' => ['required', 'mimes:png,jpeg,jpg']
        ];
    }
}
