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
            'date' => ['nullable'],
            'date_en' => ['nullable'],
            'date_to_be_maintained' => ['nullable'],
            'date_to_be_maintained_en' => ['nullable'],
            'renew_amount' => ['nullable'],
            'penalty_amount' => ['nullable'],
            'payment_receipt' => ['nullable'],
            'payment_receipt_date' => ['nullable'],
            'payment_receipt_date_en' => ['nullable'],
        ];
    }
}
