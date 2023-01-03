<?php

namespace Modules\Identity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Enum;
use Modules\Identity\Enums\CategoryTypeEnum;

class UpdateGovernmentalDisablityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('governmentalDisabilityType_edit');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'category' => ['required', new Enum(CategoryTypeEnum::class)],
        ];
    }
}
