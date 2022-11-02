<?php

namespace Modules\Roaster\Http\Requests\Settings\Designation;

use Illuminate\Foundation\Http\FormRequest;

class StoreDesignationRequest extends FormRequest
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
