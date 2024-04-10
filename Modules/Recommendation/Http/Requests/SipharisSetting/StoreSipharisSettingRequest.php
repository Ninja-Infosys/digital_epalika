<?php

namespace Modules\Recommendation\Http\Requests\sipharisSetting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSipharisSettingRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            
            'approver_id' => ['required', Rule::exists('users', 'id')->withoutTrashed()],
            'checker_id' => ['required', Rule::exists('users', 'id')->withoutTrashed()],
        ];
    }
}
