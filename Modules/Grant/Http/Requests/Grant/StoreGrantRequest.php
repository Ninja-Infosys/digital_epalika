<?php

namespace Modules\Grant\Http\Requests\Grant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Grant\Enums\GranteeEnum;

class StoreGrantRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('grant_create');
    }

    public function rules():array
    {
        return [
            'fiscal_year_id' => ['required', Rule::exists('fiscal_years', 'id')->withoutTrashed()],
            'grant_type_id' => ['required', Rule::exists('grant_types', 'id')->withoutTrashed()],
            'grant_office_id' => ['required', Rule::exists('grant_offices', 'id')->withoutTrashed()],
            'grant_program_id' => ['required', Rule::exists('grant_programs', 'id')->withoutTrashed()],
            'branch_id' => ['required', Rule::exists('branches', 'id')->withoutTrashed()],
            'grant_amount' => ['required', 'numeric'],
            'grant_for'=>['required','array'],
            'grant_for.*' => ['required',new Enum(GranteeEnum::class)],
            'main_activity' => ['nullable'],
            'remarks' => ['nullable'],
        ];
    }
}
