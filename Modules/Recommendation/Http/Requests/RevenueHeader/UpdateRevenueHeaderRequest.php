<?php

namespace Modules\Recommendation\Http\Requests\RevenueHeader;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRevenueHeaderRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title'=>['required',Rule::unique('revenue_headers','title')->withoutTrashed()->ignore($this->revenueHeader)],
            'amount'=>['required','numeric']
        ];
    }
}
