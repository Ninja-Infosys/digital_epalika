<?php

namespace Modules\EMap\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEMapTemplateRequest extends FormRequest
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
