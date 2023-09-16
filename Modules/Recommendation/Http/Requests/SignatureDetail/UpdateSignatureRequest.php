<?php

namespace Modules\Recommendation\Http\Requests\SignatureDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateSignatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string'],
            'position' => ['required', 'string'],
            //'status'=>['required',Rule::in(['active', 'inactive'])],
            'signature'=>['nullable|image|mimes:jpeg,png,jpg,gif|max:2048']
        ];
    }
}
