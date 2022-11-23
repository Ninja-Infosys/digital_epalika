<?php

namespace Modules\Recommendation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;
use Modules\Recommendation\Enums\ApplicationTypeEnum;

class UpdateFormBuilderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('FormBuilder_edit');
    }

    public function rules(): array
    {
        return [
            'application_type' => ['required', new Enum(ApplicationTypeEnum::class)],
            'form' => ['required', 'json'],
        ];
    }
}
