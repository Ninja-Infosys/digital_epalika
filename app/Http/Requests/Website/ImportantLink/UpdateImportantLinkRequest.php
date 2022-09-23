<?php

namespace App\Http\Requests\Website\ImportantLink;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImportantLinkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'link_title' => ['required', 'string', 'max:255'],
            'link_url' => ['required', 'url']
        ];
    }
}
