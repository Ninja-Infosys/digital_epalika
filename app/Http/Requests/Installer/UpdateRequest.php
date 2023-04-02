<?php

namespace App\Http\Requests\Installer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hostname' => 'required',
            'username' => 'required',
            'database' => 'required',
        ];
    }
}
