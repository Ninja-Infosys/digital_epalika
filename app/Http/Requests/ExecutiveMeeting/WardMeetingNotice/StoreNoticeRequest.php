<?php

namespace App\Http\Requests\ExecutiveMeeting\WardMeetingNotice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('wardMeeting_create');
    }

    public function rules(): array
    {
        return [
            'broadcast_date' => ['required'],
            'broadcast_time' => ['required'],
            'type' => ['required', Rule::in(config('defaults.meeting_types'))],
            'meeting_at' => ['required'],
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
            'meeting_subject.string' => 'बैठकको विषय स्ट्रिङमा हुनुपर्छ',
            'description.required' => 'विवरण आवश्यक छ'
        ];
    }
}
