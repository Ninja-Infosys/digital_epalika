<?php

namespace Modules\Identity\Http\Requests\DisabilityType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreDisabilityTypeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('disabilityType_create');
    }

    public function rules():array
    {
        return [
            'title'=>['required','string','max:255'],
            'title_en'=>['required','string','max:255'],
        ];
    }
}
