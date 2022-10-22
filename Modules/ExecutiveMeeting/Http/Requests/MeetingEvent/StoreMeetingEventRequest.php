<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MeetingEvent;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeetingEventRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'event_name'=>['required'],
            'recurrence'=>['required'],
            'start_date'=>['required'],
            'en_start_date'=>['nullable','date'],
            'end_date'=>['required'],
            'en_end_date'=>['nullable','date'],
            'event_for'=>['nullable'],
            'url',
            'recurrence_end_date',
            'en_recurrence_end_date',
            'description'
        ];
    }
}
