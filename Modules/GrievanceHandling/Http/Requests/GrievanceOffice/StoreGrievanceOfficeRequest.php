<?php

namespace Modules\GrievanceHandling\Http\Requests\GrievanceOffice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreGrievanceOfficeRequest extends FormRequest
{
    public function authorize():bool
    {
        return Gate::allows('grievanceOffice_create');
    }

    public function rules():array
    {
        return [
            'title'=>['required',Rule::unique('grievance_offices','title')->withoutTrashed()]
        ];
    }
}
