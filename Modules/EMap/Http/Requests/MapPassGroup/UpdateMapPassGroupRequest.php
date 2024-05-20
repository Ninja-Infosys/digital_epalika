<?php

namespace Modules\EMap\Http\Requests\MapPassGroup;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMapPassGroupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'users' => ['nullable', 'array'],
            'users.*.user_id' => ['nullable'],
            'users.*.ward_no' => ['nullable', 'array'],
        ];
    }
}
