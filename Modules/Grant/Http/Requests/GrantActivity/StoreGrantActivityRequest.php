<?php

namespace Modules\Grant\Http\Requests\GrantActivity;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrantActivityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'grant_recipient_type' => ['required'],
            'title' => ['required'],
        ];
    }

    public function messages()
    {
        return[
            'grant_recipient_type.required' => 'अनुदान प्राप्तकर्ता आवश्यक छ',
            'title.required' => 'अनुदान आवश्यक छ',
        ];
    }
}
