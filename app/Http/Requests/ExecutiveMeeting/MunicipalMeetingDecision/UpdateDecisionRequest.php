<?php

namespace App\Http\Requests\ExecutiveMeeting\MunicipalMeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('municipalMeeting_edit');
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

    public function messages(): array
    {
        return [
            'meeting_detail_id.required' => 'नगरपालिका बैठक आईडी आवश्यक छ',
            'subject.string' => 'विषय स्ट्रिङ फर्ममा हुनुपर्छ',
            'decision_file.mimes' => 'निर्णय फाइल अनिबार्य png, jpeg, jpg मा हुनुपर्छ '
        ];
    }
}
