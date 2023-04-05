<?php

namespace App\Http\Requests\Installer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class LicenseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'key' => ['required', 'uuid']
        ];
    }
}
