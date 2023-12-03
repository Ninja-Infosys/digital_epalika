<?php

namespace Modules\EMap\Http\Requests\MapPassGroup;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

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
            'users' => ['required', 'array'],
            'users.*.user_id' => ['required'],
            'users.*.ward_no' => ['required', 'array'],
        ];
    }
}
