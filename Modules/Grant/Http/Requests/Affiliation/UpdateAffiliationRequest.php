<?php

namespace Modules\Grant\Http\Requests\Affiliation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAffiliationRequest extends FormRequest
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
