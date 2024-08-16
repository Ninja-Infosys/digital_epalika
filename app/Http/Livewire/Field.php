<?php

namespace App\Http\Livewire;

use App\Models\MobileUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Recommendation\Entities\RecommendationDetail;

class Field extends Component
{
    use WithFileUploads;

    public string|int|null $mobile_user_id = null;

    public string|int|null $recommendation_detail_id = null;

    public $status = 1;

    public $fields = [];

    public $fieldData = [];

    public $mobileUsers = [];

    public $documents = [];

    public $formTypes = [];

    public $data = [];

    public function mount($categorySubCategory = null): void
    {
        //        dd($this->fields);
        if (! empty($categorySubCategory)) {
            $this->mobile_user_id = $categorySubCategory['mobile_user_id'] ?? null;
            $this->recommendation_detail_id = $categorySubCategory['recommendation_detail_id'] ?? null;
            $this->status = $categorySubCategory['status'] ? 1 : 0;
            if (array_key_exists('fields', $categorySubCategory) && ! empty($categorySubCategory['fields'])) {
                foreach ($categorySubCategory['fields'] as $field) {

                    $this->fieldData[$field->recommendationFormField?->slug] = [
                        'recommendation_form_field_id' => $field->sipharish_form_field_id ?? $field['recommendation_form_field_id'] ?? null,
                        'value' => $field->value ?? $field['value'] ?? null,
                    ];
                }
            }
        }
        $this->mobileUsers = MobileUser::with('mobileUserDetail')->get();
        // $this->formTypes = RecommendationDetail::get();

        $authUserWardNo = Auth::user()->ward_no;

        if ($authUserWardNo) {
            $this->mobileUsers = MobileUser::with('mobileUserDetail')
                ->whereHas('mobileUserDetail', function ($query) use ($authUserWardNo) {
                    $query->where('ward_no', $authUserWardNo);
                })
                ->get();
        } else {
            $this->mobileUsers = MobileUser::with('mobileUserDetail')->get();
        }

        $this->formTypes = RecommendationDetail::get();
    }

    public function addRowInTable($index): void
    {
        $this->data[$index][] = [];
    }

    public function getFieldData(string $slug)
    {
        return $this->fieldData[$slug] ?? [];
    }

    public function removeRowInTable($index, $childIndex): void
    {
        if (isset($this->data[$index][$childIndex])) {
            $formDataTypeCollection = collect($this->data[$index]);
            $formDataTypeCollection->forget($childIndex);
            $this->data[$index] = $formDataTypeCollection->values()->all();
        }
    }

    public function setType($index, $childIndex, $childSlug, $value): void
    {
        $this->data[$index][$childIndex][$childSlug]['type'] = $value;
        if (! empty($this->data[$index][$childIndex][$childSlug]['data'])) {
            if ($value == 'image') {
                $recommendationFile = Storage::disk('public')
                    ->putFile('recommendation/files', $this->data[$index][$childIndex][$childSlug]['data']);
                $this->data[$index][$childIndex][$childSlug]['value'] = $recommendationFile;
            } else {
                $this->data[$index][$childIndex][$childSlug]['value'] = $this->data[$index][$childIndex][$childSlug]['data'];
            }
        }
    }

    public function setParentType($index, $childIndex, $childSlug, $value): void
    {
        $this->data[$index]['type'] = $value;
    }

    public function render()
    {

        if (! empty($this->recommendation_detail_id)) {
            $recommendationDetail = RecommendationDetail::with('recommendationFormFields.recommendationFormFields', 'recommendationDocuments')
                ->find($this->recommendation_detail_id);

            $this->fields = $recommendationDetail?->recommendationFormFields;

            $this->documents = $recommendationDetail?->recommendationDocuments ?? [];

        }

        return view('livewire.field');
    }
}
