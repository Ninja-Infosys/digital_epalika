<?php

namespace Modules\EMap\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;

class StoreEMapTemplateRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title' => ['required'],
            'for' => ['required'],
            'type' => ['required'],
            'data' => ['required'],
            'requires_header' => ['nullable', 'boolean']
        ];
    }
}
