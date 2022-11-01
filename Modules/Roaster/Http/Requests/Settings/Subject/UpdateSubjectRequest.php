<?php

namespace App\Http\Requests\Admin\Settings\Subject;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'level' => ['required'],
            'duration' => ['required'],
            'content' => ['nullable'],
        ];
    }
}
