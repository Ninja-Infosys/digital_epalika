<?php

namespace App\Http\Requests\ExecutiveMeeting\MunicipalMeetingNotice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('municipalMeeting_create');
    }

    public function rules(): array
    {
        return [
            'broadcast_date' => ['required'],
            'type' => ['required', Rule::in(config('meetingType'))],
            'meeting_subject' => ['required','string'],
            'description' => ['required']
        ];
    }
}
