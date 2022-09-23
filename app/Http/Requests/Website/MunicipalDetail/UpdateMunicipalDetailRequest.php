<?php

namespace App\Http\Requests\Website\MunicipalDetail;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMunicipalDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['required'],
            'count' => ['required'],
            'bg_color' => ['required'],
            'position' => ['nullable', 'integer']
        ];
    }
}
