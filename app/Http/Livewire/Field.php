<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use  Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisFormField;
use  Modules\Recommendation\Entities\SipharisSubCategory;
use  Modules\Recommendation\Entities\SipharishFormType;
use  Modules\Recommendation\Entities\PersonalDetail;
use Livewire\Component;

class Field extends Component
{
    use WithFileUploads;

    public string|int|null $personal_detail_id = null;
    public string|int|null $sipharis_category_id = null;
    public string|int|null $sipharis_sub_category_id = null;
    public string|int|null $sipharis_form_type_id = null;
    public $status = 1;
    public $fields = [];
    public $fieldData = [];
    public $personalDetails = [];
    public $sipharishCategories = [];
    public $sipharishSubCategories = [];

    public $formTypes = [];

    public $data = [];

    protected $sipharishFormFields = [];

    private function getFormFields(int|string $id)
    {
        return $this->sipharishFormFields->where('id', $id)->first();
    }

    public function mount($categorySubCategory = null): void
    {
        if (!empty($categorySubCategory)) {
            $this->sipharishFormFields = SipharisFormField::all();
            $this->sipharis_category_id = $categorySubCategory['sipharis_category_id'] ?? null;
            $this->sipharis_sub_category_id = $categorySubCategory['sipharis_sub_category_id'] ?? null;
            $this->personal_detail_id = $categorySubCategory['personal_detail_id'] ?? null;
            $this->sipharis_form_type_id = $categorySubCategory['sipharis_form_type_id'] ?? null;
            $this->status = $categorySubCategory['status'] ? 1 : 0;
            if (array_key_exists('fields', $categorySubCategory) && !empty($categorySubCategory['fields'])) {
                foreach ($categorySubCategory['fields'] as $field) {
                    $slug = $this->getFormFields($field->sipharish_form_field_id
                        ?? $field['sipharish_form_fields_id'])
                        ->slug;
                    if ($field->type ?? $field['type'] == 'table') {
                        $value = json_decode($field->value ?? $field['value'] ?? null, true);

                        if (!empty($value) && is_array($value)) {
                            foreach ($value as $data) {
                                $this->data[$slug][] = $data;
                            }
                        }
                    }
                    $this->fieldData[$slug] = [
                        'sipharish_form_fields_id' => $field->sipharish_form_field_id ?? $field['sipharish_form_fields_id'] ?? null,
                        'value' => $field->value ?? $field['value'] ?? null,
                        'type' => $field->type ?? $field['type'] ?? null,
                    ];
                }
            }
        }
        $this->sipharishCategories = SipharisCategory::status()->get();
        $this->personalDetails = PersonalDetail::all();
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
        if (!empty($this->data[$index][$childIndex][$childSlug]['data'])) {
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
        if (!empty($this->sipharis_category_id)) {
            $this->sipharishSubCategories = SipharisSubCategory::where('sipharis_category_id', $this->sipharis_category_id)->get();
        }

        if (!empty($this->sipharis_sub_category_id)) {
            $this->formTypes = SipharishFormType::where('sipharis_sub_category_id', $this->sipharis_sub_category_id)
                ->get();
        }

        if (!empty($this->sipharis_form_type_id)) {
            $this->fields = SipharishFormType::with('sipharisFormFields.SipharishFormFields')
                ->find($this->sipharis_form_type_id)
                ?->sipharisFormFields;
        }
        return view('livewire.field');
    }
}
