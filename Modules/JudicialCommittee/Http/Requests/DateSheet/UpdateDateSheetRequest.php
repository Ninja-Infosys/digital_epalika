<?php

namespace Modules\JudicialCommittee\Http\Requests\DateSheet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDateSheetRequest extends FormRequest
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
