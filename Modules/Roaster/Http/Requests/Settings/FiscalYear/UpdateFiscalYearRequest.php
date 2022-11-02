<?php

namespace App\Http\Requests\Admin\Settings\FiscalYear;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFiscalYearRequest extends FormRequest
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
