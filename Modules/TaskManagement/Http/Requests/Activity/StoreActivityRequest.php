<?php

namespace Modules\TaskManagement\Http\Requests\Activity;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreActivityRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows();
    }

    public function rules():array
    {
        return [
            //
        ];
    }
}
