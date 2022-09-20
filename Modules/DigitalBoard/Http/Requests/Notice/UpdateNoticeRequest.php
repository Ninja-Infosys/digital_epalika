<?php

namespace Modules\DigitalBoard\Http\Requests\Notice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('digitalBoardNotice_edit');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'description' => ['nullable'],
            'closed_at' => ['nullable'],
            'type' => ['required', Rule::in(config('defaults.notice_type'))],
            'show_on_index' => ['nullable', 'boolean'],
            'files' => ['nullable', 'array'],
            'files.*' => ['mimes:png,jpeg,jpg'],
        ];


    }

    public function messages()
    {
        return[
            'title.required'=>'शिर्षक अनिबार्य छ।',
            'date.required'=>'मिति अनिबार्य छ।'
        ];
    }
}
