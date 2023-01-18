<?php

namespace Modules\Plan\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Enums\PlanTemplateTypeEnum;

class UpdatePlanTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['nullable',new Enum(PlanTemplateTypeEnum::class)],
            'title' => ['required', Rule::unique('plan_templates', 'title')->withoutTrashed()->ignore($this->planTemplate)],
            'data' => ['required']
        ];
    }
}
