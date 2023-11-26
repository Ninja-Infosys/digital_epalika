<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisFormField;
use Modules\Recommendation\Entities\SipharishFormType;
use Modules\Recommendation\Entities\SipharisSubCategory;

class SipharishFormTypeLivewire extends Component
{
    public $sipharishCategories = [];
    public $sipharishSubCategories = [];
    public $formData;
    public $formTypes = [];
    public array $form = [
        'sipharis_category_id' => null,
        'sipharis_sub_category_id' => null,
        'title' => null,
        'status' => null,
        'need_approval' => null,
        'formDataType' => []

    ];
    public $existingForm = null;
    public function mount($formData = null)
    {
        $this->sipharishCategories = SipharisCategory::status()->get();
        if (!empty($formData)) {
            $this->existingForm = $formData;
            $this->form['title'] = $formData->title;
            $this->form['status'] = $formData->status == true ? 1 : 0;
            $this->form['sipharis_category_id'] = SipharisSubCategory::active()->where('id', $formData->sipharis_sub_category_id)->first()->sipharis_category_id ?? null;
            $this->form['sipharis_sub_category_id'] = $formData->sipharis_sub_category_id;
            $this->form['need_approval'] = $formData->need_approval;

            $formDataTypeArray = [];

            foreach ($formData->sipharisFormFields as $index => $formDataType) {
                $formDataTypeArray[$index]['id'] = $formDataType->id;
                $formDataTypeArray[$index]['field_name'] = $formDataType->field_name;
                $formDataTypeArray[$index]['slug'] = $formDataType->slug ?? '';
            }

            $this->form['formDataType'] = $formDataTypeArray;
        }
    }

    public function addRow()
    {
        $this->form['formDataType'][] =   [];
    }

    public function removeRow($index)
    {
        if (isset($this->form['formDataType'][$index])) {
            $formDataType = $this->form['formDataType'][$index];

            if (isset($formDataType['id'])) {
                $formDataTypeRecord = SipharisFormField::find($formDataType['id']);
                if ($formDataTypeRecord) {
                    $formDataTypeRecord->delete();
                }
            }
            $formDataTypeCollection = collect($this->form['formDataType']);
            $formDataTypeCollection->forget($index);

            $this->form['formDataType'] = $formDataTypeCollection->values()->all();
        }
    }
    protected $rules = [
        "form.sipharis_category_id" => ['required'],
        "form.sipharis_sub_category_id" => ['required'],
        "form.title" => ['required'],
        "form.status" => ['required'],
        "form.need_approval" => ['required'],
        "form.formDataType" => ['required', 'array'],
        "form.formDataType.*.field_name" => ['required'],
        "form.formDataType.*.slug" => ['required', 'alpha_dash'],
    ];
    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();
        DB::transaction(function () use ($validatedData) {
            if (!empty($this->existingForm)) {
                $this->existingForm->update($validatedData['form']);
                $form = $this->existingForm;
            } else {
                $form = SipharishFormType::create($validatedData['form'] + [
                    'created_by' => auth()->id()
                ]);
            }
            $existingFormFieldsId = collect($form->sipharisFormFields?->pluck('id'));
            $newId = collect();
            foreach ($validatedData['form']['formDataType'] as $formDataType) {
                if (array_key_exists('id', $formDataType) && !empty($formDataType['id'])) {
                    $formDataTypeData = SipharisFormField::find($formDataType['id']);
                    $formDataTypeData->update($formDataType);
                } else {
                    $formDataTypeData = $form->sipharisFormFields()->create($formDataType + [
                        'created_by' => auth()->id()
                    ]);
                }
                $newId->push($formDataTypeData->id);
            }
            $diff = $existingFormFieldsId->diff($newId->filter());

            SipharisFormField::whereIn('id', $diff->toArray())->delete();
        });

        $this->reset('form');
        toast('सफलतापूर्वक थपियो', 'success');
        return redirect(route('admin.recommendation.sipharish.sipharishFormType.index'));
    }

    public function render()
    {
        if (!empty($this->form['sipharis_category_id'])) {
            $this->sipharishSubCategories = SipharisSubCategory::whereSipharisCategoryId($this->form['sipharis_category_id'])
                ->active()
                ->get();
        }
        return view('livewire.sipharish-form-type-livewire');
    }
}
