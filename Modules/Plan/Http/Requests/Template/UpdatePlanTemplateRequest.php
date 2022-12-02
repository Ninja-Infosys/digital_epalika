<?php

namespace Modules\Plan\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlanTemplateRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'type' => ['required'],
            'title' => ['required', Rule::unique('plan_templates', 'title')->withoutTrashed()],
            'data' => ['required']
        ];
    }
}
