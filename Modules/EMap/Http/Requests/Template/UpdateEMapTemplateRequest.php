<?php

namespace Modules\EMap\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateEMapTemplateRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('eMapTemplate_edit');
    }

    public function rules():array
    {
        return [
            'title' => ['required'],
            'for' => ['required',Rule::unique('e_map_templates','for')->withoutTrashed()->ignore($this->eMapTemplate)],
            'type' => ['required'],
            'data' => ['required'],
            'requires_header' => ['nullable', 'boolean']
        ];
    }
}
