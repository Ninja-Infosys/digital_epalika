<?php

namespace Modules\Identity\Http\Requests\CardColor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCardColorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('cardColor_create');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255']
        ];
    }
}
