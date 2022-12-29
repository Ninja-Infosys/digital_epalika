<?php

namespace Modules\Identity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateGovernmentalDisablityRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('governmentalDisabilityType_edit');
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
