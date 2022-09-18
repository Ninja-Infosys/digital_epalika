<?php

namespace App\Http\Requests\ExecutiveMeeting\MunicipalMeetingNotice;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoticeRequest extends FormRequest
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
