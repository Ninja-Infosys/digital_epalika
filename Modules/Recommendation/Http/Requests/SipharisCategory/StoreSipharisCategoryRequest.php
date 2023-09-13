<?php

namespace Modules\Recommendation\Http\Requests\SipharisCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSipharisCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            //'status'=>['required',Rule::in(['active', 'inactive'])]
        ];
    }
}
