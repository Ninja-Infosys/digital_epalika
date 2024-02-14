<?php

namespace Modules\Recommendation\Http\Requests\RevenueHeader;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRevenueHeaderRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'title'=>['required',Rule::unique('revenue_headers','title')->withoutTrashed()],
            'amount'=>['required','numeric']
        ];
    }
}
