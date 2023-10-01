<?php

namespace Modules\EMap\Http\Requests\MapPassGroup;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMapPassGroupRequest extends FormRequest
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
            'users.*' => [Rule::exists('users', 'id')->withoutTrashed()]
        ];
    }
}
