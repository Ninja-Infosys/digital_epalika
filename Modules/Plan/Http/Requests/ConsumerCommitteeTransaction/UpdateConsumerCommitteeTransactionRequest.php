<?php

namespace Modules\Plan\Http\Requests\ConsumerCommitteeTransaction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Plan\Enums\TransactionTypeEnum;

class UpdateConsumerCommitteeTransactionRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'type' => ['required', new Enum(TransactionTypeEnum::class)],
            'date' => ['required'],
            'amount' => ['required', 'numeric'],
            'remarks' => ['nullable']
        ];
    }
}
