<?php

namespace App\Http\Requests\Admin\Settings\Designation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDesignationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('designations', 'title')->withoutTrashed()]
        ];
    }
}
