<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MeetingEvent;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_name' => ['required'],
            'start_date' => ['required'],
            'en_start_date' => ['nullable', 'date'],
            'end_date' => ['required'],
            'committee_ward'=>['nullable','array'],
            'en_end_date' => ['nullable', 'date'],
            'url' => ['nullable'],
            'recurrence_end_date' => ['nullable'],
            'en_recurrence_end_date' => ['nullable', 'date'],
            'description' => ['required'],
        ];
    }
}
