<?php

namespace App\Http\Requests\ExecutiveMeeting\WardMeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('wardMeeting_edit');
    }

    public function rules(): array
    {
        return [
            'meeting_detail_id' => ['required', Rule::exists('meeting_details', 'id')->withoutTrashed()],
            'subject' => ['nullable', 'string'],
            'date' => ['nullable'],
            'description' => ['nullable'],
            'decision_file' => ['nullable', 'mimes:png,jpeg,jpg']
        ];
    }

    public function messages()
    {
        return [
            'ward_meeting_notice_id.required' => 'वार्ड बैठक सूचना आवश्यक छ',
            'subject.string' => 'विषय स्ट्रिङमा हुनुपर्छ',
            'decision_file.mimes' => 'निर्णय फाइल jpeg, jpg, png मा हुनुपर्छ'
        ];
    }
}
