<?php

namespace Modules\OrganizationRegistration\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "tax_payer_number" => ['nullable', 'string', 'max:255'],
            "registration_date" => ['required'],
            "registration_date_en" => ['required', 'date'],
            "name" => ['required', 'string', 'max:255'],
            "business_start_date" => ['required', 'date'],
            "business_nature_id" => ['required', 'integer'],
            "object_transaction_id" => ['required', 'integer'],
            "province_id" => ['required', 'integer'],
            "district_id" => ['required', 'integer'],
            "local_body_id" => ['required', 'integer'],
            "ward_no" => ['required', 'integer'],
            "tole" => ['required', 'string', 'max:255'],
            "street_name" => ['nullable', 'string', 'max:255'],
            "house_number" => ['nullable', 'string', 'max:255'],
            "capital_investment" => ['required', 'integer'],
            "working_capital" => ['required', 'integer'],
            "fixed_capital" => ['required', 'integer'],
            "board_size" => ['required', 'integer'],
            "owner_name" => ['required', 'string', 'max:255'],
            "citizenship_number" => ['required', 'string', 'max:255'],
            "citizenship_issue_date" => ['required', 'date'],
            "citizenship_issue_district_id" => ['required', 'integer'],
            "business_rent_owner" => ['required', 'string', 'max:255'],
            "owner_photo" => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
            "address" => ['required', 'string', 'max:255'],
        ];

    }
}
