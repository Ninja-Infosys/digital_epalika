<?php

namespace App\Http\Requests\ExecutiveMeeting\MunicipalMeetingNotice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateNoticeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('municipalMeeting_edit');
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
