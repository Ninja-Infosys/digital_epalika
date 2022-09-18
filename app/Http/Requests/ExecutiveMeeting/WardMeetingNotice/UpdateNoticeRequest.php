<?php

namespace App\Http\Requests\ExecutiveMeeting\WardMeetingNotice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('wardMeeting_edit');
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
