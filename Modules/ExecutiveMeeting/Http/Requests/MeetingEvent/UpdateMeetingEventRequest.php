<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MeetingEvent;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingEventRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
