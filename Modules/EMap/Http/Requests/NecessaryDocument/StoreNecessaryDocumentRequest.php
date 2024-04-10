<?php

namespace Modules\EMap\Http\Requests\NecessaryDocument;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreNecessaryDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('necessaryDocument_create');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:250'],   
            'description' => ['required', 'string',],
            // 'files' => ['required', 'array'],
            // 'files.*' => ['file', 'mimes:pdf,png,jpeg,jpg'],
          

        ];
    }
}
