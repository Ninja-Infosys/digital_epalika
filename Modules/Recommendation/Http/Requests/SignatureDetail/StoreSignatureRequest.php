<?php

namespace Modules\Recommendation\Http\Requests\SignatureDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreSignatureRequest extends FormRequest
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
            'status'=>['required'],
            'signature'=>['nullable','image']
        ];
    }
}
