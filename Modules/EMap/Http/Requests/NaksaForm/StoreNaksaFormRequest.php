<?php

namespace Modules\EMap\Http\Requests\NaksaForm;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreNaksaFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'order' => ['nullable','integer'],
            'form_type'=> ['required','string'],
            'route_name'=>['required_if:form_type,form','string'],
            'map_pass_group_id' => ['required',Rule::exists('map_pass_groups', 'id')->withoutTrashed()],
            'need_from'         => ['required','string'],
            'fields' => ['nullable', 'array'],
            'fields.*.title'=>['required','file'],
            'fields.*.status'=>['required','string'],
            'fields.*.description'=>['required','string'],

        ];
    }
}