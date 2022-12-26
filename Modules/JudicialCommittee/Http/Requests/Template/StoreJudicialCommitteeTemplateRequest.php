<?php

namespace Modules\JudicialCommittee\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJudicialCommitteeTemplateRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'type' => ['required',Rule::unique('judicial_committee_templates', 'type')->withoutTrashed()],
            'title' => ['required', Rule::unique('judicial_committee_templates', 'title')->withoutTrashed()],
            'data' => ['required']
        ];
    }
}
