<?php

namespace Modules\Recommendation\Http\Requests\SignaturePerson;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignaturePersonRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name'=>['required','string','max:250'],
            'image' => ['nullable', 'mimes:,png,jpeg,jpg'],
            'signature_image' => ['required', 'mimes:,png,jpeg,jpg'],
        ];
    }
}
