<?php

namespace Modules\EMap\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasswordRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'password' => [
                'string', 'min:8', 'confirmed'
            ],
        ];
    }
}
