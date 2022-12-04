<?php

namespace Modules\EMap\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreEMapTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('eMapTemplate_create');
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'type' => ['required'],
            'data' => ['required'],
        ];
    }
}
