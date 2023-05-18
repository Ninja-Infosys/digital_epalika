<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMeetingDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('meetingDecision_create');
    }

    public function rules(): array
    {
        return [
            'meetingDecisions' => ['required', 'array'],
            'meetingDecisions.*.meeting_agenda_id' => ['required', Rule::exists('meeting_agendas', 'id')->where('meeting_id', $this->meeting->id)->withoutTrashed()],
            'meetingDecisions.*.date' => ['required'],
            'meetingDecisions.*.en_date' => ['required', 'date'],
            'meetingDecisions.*.description' => ['required'],
        ];
    }
}
