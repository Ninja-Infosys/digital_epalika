<?php

namespace App\Http\Requests\ExecutiveMeeting\WardMeetingNotice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('wardMeeting_edit');
    }

    public function rules(): array
    {

        return [
            'broadcast_date' => ['required'],
            'type' => ['required', Rule::in(config('meetingType'))],
            'meeting_subject' => ['required', 'string'],
            'description' => ['required']
        ];

    }

    public function messages()
    {
        return [
            'broadcast_date.required' => 'प्रसारण मिति आवश्यक छ',
            'type.required' => 'प्रकार आवश्यक छ',
            'meeting_subject.required' => 'बैठक विषय आवश्यक छ',
            'description.required' => 'विवरण आवश्यक छ'
        ];
    }
}
