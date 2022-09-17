<?php

namespace App\Http\Requests\ExecutiveMeeting\MunicipalCommittee;

use Illuminate\Foundation\Http\FormRequest;

class StoreMunicipalCommitteeRequest extends FormRequest
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
