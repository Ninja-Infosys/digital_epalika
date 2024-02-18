<?php

namespace Modules\EMap\Http\Requests\Api\Organization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\EMap\Enums\PostsEnum;

class UpdateDesignerDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'father_name' => ['required'],
            'grandfather_name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'local_body' => ['required'],
            'ward_no' => ['required', 'integer'],
            'post' => ['required',Rule::enum(PostsEnum::class)],
            'nec_council_no' => ['nullable'],
            'local_body_registration_no' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'नाम अनिवार्य छ|',
            'father_name.required' => 'बुबाको नाम अनिवार्य छ|',
            'grand_father_name.required' => 'हजुरबुबाको नाम अनिवार्य छ|',
            'phone.required' => ' फोन अनिवार्य छ|',
            'address.required' => ' ठेगाना अनिवार्य छ|',
            'local_body.required' => ' पालिका  अनिवार्य छ|',
            'ward_no.required' => ' वडा नं.   अनिवार्य छ|',
            'post.required' => 'पद अनिवार्य छ|'
        ];
    }
}
