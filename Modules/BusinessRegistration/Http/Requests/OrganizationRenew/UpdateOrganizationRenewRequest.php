<?php

namespace Modules\BusinessRegistration\Http\Requests\OrganizationRenew;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationRenewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required'],
            'date_en' => ['nullable'],
            'date_to_be_maintained' => ['required'],
            'date_to_be_maintained_en' => ['nullable'],
            'renew_amount' => ['required'],
            'penalty_amount' => ['required'],
            'payment_receipt' => ['required'],
            'payment_receipt_date' => ['required'],
            'payment_receipt_date_en' => ['nullable'],
        ];
    }
}
