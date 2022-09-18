<?php

namespace App\Http\Requests\ExecutiveMeeting\WardMeetingNotice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreNoticeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('wardMeeting_create');
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
