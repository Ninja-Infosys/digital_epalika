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
            'title' => ['required','string','max:255'],
            'title_en' => ['required','string','max:255'],
            'color'=>['required','string','max:255']
        ];
    }
}
