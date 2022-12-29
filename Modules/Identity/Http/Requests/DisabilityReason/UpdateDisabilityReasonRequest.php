<?php

namespace Modules\Identity\Http\Requests\DisabilityReason;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateDisabilityReasonRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('disabilityReason_edit');
    }

    public function rules():array
    {
        return [
            'title'=>['required','string','max:255']
        ];
    }
}
