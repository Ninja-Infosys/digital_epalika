<?php

namespace Modules\OrganizationRegistration\Http\Requests\BusinessRenew;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBusinessRenewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fiscal_year_id' => ['required', Rule::exists('fiscal_Years', 'id')->withoutTrashed()],
            'business_renew_date' => ['required'],
            'business_renew_date_en' => ['required'],
            'date_to_be_maintained' => ['required'],
            'date_to_be_maintained_en' => ['required'],
            'renew_amount' => ['required'],
            'penalty_amount' => ['required'],
            'payment_receipt' => ['required'],
            'payment_receipt_date' => ['required'],
            'payment_receipt_date_en' => ['required'],

        ];
    }
}
