<?php

namespace Modules\Identity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreGovernmentalDisablityRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('governmentalDisabilityType_create');
    }

    public function rules():array
    {
        return [
            'type' => ['required','string','max:255'],
            'code_color_id'=>['required','string','max:255']
        ];
    }
}
