<?php

namespace Modules\Identity\Http\Requests\DisabilityType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateDisabilityTypeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('disabilityType_edit');
    }

    public function rules():array
    {
        return [
            'title'=>['required','string','max:255']
        ];
    }
}
