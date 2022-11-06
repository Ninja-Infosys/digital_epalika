<?php

namespace Modules\JudicialCommittee\Http\Requests\JudicialMember;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJudicialMemberRequest extends FormRequest
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
