<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'measurement_unit_id' => ['required', Rule::exists('measurement_units', 'id')->withoutTrashed()],
            'title' => ['required'],
        ];
    }
}
