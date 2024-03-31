<?php

namespace Modules\EMap\Http\Requests\NecessaryDocument;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateNecessaryDocumentRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('necessaryDocument_edit');
    }

    public function rules():array
    {
        return [
            'title' => ['required','string','max:250'],
            'description' => ['nullable','string','max:2000'],
            'file' => ['nullable', 'array'],
             'file.*' => ['mimes:png,jpeg,jpg'],
        ];
    }
}
