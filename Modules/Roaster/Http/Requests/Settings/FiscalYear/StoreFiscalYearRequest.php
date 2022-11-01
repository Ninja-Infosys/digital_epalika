<?php

namespace App\Http\Requests\Admin\Settings\FiscalYear;

use Illuminate\Foundation\Http\FormRequest;

class StoreFiscalYearRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'year'=>['required']
        ];
    }
}
