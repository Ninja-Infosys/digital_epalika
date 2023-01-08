<?php

namespace Modules\OrganizationRegistration\Http\Requests\BusinessRenew;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessRenewRequest extends FormRequest
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
