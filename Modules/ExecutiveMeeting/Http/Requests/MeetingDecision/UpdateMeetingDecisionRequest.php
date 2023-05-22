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
            'date' => ['required'],
            'en_date' => ['required', 'date'],
            'description' => ['required'],
        ];
    }
}
