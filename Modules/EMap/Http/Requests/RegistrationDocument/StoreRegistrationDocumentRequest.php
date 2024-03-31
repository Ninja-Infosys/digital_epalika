<?php

namespace Modules\EMap\Http\Requests\RegistrationDocument;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreRegistrationDocumentRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('registrationDocument_create');
    }

    public function rules():array
    {
        return [
            'description' =>['required','string'],
        ];
    }
}
