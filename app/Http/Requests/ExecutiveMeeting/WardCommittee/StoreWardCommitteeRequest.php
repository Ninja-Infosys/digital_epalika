<?php

namespace App\Http\Requests\ExecutiveMeeting\WardCommittee;

use Illuminate\Foundation\Http\FormRequest;

class StoreWardCommitteeRequest extends FormRequest
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
