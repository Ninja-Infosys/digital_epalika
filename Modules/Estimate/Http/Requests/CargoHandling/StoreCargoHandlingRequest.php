<?php

namespace Modules\Estimate\Http\Requests\CargoHandling;

use Illuminate\Foundation\Http\FormRequest;

class StoreCargoHandlingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
