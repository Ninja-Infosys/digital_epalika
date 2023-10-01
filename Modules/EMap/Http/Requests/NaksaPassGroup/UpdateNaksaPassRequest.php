<?php

namespace Modules\EMap\Http\Requests\NaksaPassGroup;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateNaksaPassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            //'status'=>['required',Rule::in(['active', 'inactive'])]
        ];
    }
}