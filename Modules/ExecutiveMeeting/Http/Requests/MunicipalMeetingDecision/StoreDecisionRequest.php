<?php

namespace Modules\ExecutiveMeeting\Http\Requests\MunicipalMeetingDecision;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreDecisionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('municipalMeeting_create');
    }

    public function rules(): array
    {
        return [
            'meeting_detail_id' => ['required', Rule::exists('meeting_details', 'id')->withoutTrashed()],
            'subject' => ['required', 'string'],
            'date' => ['required'],
            'description' => ['nullable'],
            'decision_file' => ['required', 'mimes:png,jpeg,jpg']
        ];
    }

    public function messages(): array
    {
        return [
            'meeting_detail_id.required' => 'बैठक सूचना आईडी आवश्यक छ',
            'decision_file.required' => 'निर्णय फाइल आवश्यक छ',
            'decision_file.mimes' => 'निर्णय फाइल अनिबार्य png, jpeg, jpg मा हुनुपर्छ '
        ];
    }
}
