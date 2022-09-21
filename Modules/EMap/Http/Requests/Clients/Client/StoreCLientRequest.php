<?php

namespace Modules\EMap\Http\Requests\Clients\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreCLientRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
