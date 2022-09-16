<?php

namespace Modules\DigitalBoard\Http\Requests\Notice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreNoticeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('digitalBoardNotice_create');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'description' => ['nullable'],
            'closed_at' => ['nullable'],
            'is_notice' => ['nullable'],
        ];
    }
}
