<?php

namespace Modules\JudicialCommittee\Http\Requests\DateCompensation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDateCompensationRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
