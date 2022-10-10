<?php

namespace Modules\BusinessRegistration\Http\Requests\ObjectTransaction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreObjectTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
        ];
    }
}
