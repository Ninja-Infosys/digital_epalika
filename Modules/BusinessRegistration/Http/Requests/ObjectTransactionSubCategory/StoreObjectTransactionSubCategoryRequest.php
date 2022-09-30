<?php

namespace Modules\BusinessRegistration\Http\Requests\ObjectTransactionSubCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreObjectTransactionSubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'category_a' => ['required', 'string'],
            'category_b' => ['required', 'string'],
            'category_c' => ['required', 'string'],
            'object_transaction_id' => ['nullable', Rule::exists('object_transactions', 'id')->withoutTrashed()]
        ];
    }
}
