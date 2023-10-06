<?php

namespace Modules\Identity\Http\Requests\PrintDate;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePrintDateRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'disability_identity_card_id'=>['nullable', Rule::exists('disability_identity_card','id')->withoutTrashed()],
            'print_date'=> ['nullable'],
            'print_date_en' => ['nullable'],
            'old_print_date' => ['nullable'],
            'old_print_date_en' => ['nullable'],
        ];
    }
}
