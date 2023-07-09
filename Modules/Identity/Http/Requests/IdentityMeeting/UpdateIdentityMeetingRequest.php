<?php

namespace Modules\Identity\Http\Requests\IdentityMeeting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIdentityMeetingRequest extends FormRequest
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
