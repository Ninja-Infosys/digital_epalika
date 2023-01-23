<?php

namespace Modules\Plan\Http\Requests\ProjectDocument;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'document_name' => ['required'],
            'data' => ['required']
        ];
    }
}
