<?php

namespace Modules\Roaster\Http\Requests\Settings\Subject;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title' => ['required'],
            'level' => ['required'],
            'duration' => ['required'],
            'content' => ['nullable'],
        ];
    }
}
