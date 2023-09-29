<?php

namespace Modules\EMap\Http\Requests\NaksaPassGroupUser;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreNaksaPassGroupUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|array',
            'user_id.*' => ['required', Rule::exists('users', 'id')->withoutTrashed()],
            'group_id' => 'required|array',
            'group_id.*' => ['required', Rule::exists('map_pass_groups', 'id')->withoutTrashed()],
        ];
    }
}