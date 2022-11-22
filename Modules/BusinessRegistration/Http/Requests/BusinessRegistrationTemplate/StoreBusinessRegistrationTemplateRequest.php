<?php

namespace Modules\BusinessRegistration\Http\Requests\BusinessRegistrationTemplate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;
use Modules\BusinessRegistration\Enums\TemplateTypeEnum;

class StoreBusinessRegistrationTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('businessRegistrationTemplate_create');
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'for' => ['required', new Enum(TemplateTypeEnum::class)],
            'data' => ['required'],
            'requires_header' => ['nullable', 'boolean'],
        ];
    }
}
