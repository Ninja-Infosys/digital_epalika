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
    public $formData;

    public array $form = [

        'formDataType' => []

    ];
    public function mount($formData = null)
    {
        if (!empty($formData)) {
            foreach ($formData->recommendationFormFields as $index => $formDataType) {

                $this->form['formDataType'][]=[
                    'id'=>$formDataType->id ?? null,
                    'field_name'=>$formDataType->field_name ?? null,
                    'slug'=>$formDataType->slug ?? null,
                    'type'=>$formDataType->type->value ?? null,

                ] ;
                foreach ($formDataType->recommendationFormFields as $childIndex => $fields) {
                    $this->form['formDataType'][$index]['table'][]=[
                        'id'=>$fields->id ?? null,
                        'field_name'=>$fields->field_name ?? null,
                        'slug'=>$fields->slug ?? null,
                        'type'=>$fields->type ?? null,

                    ] ;
                }

            }
        }else{
            $this->form['formDataType'][] = [[]];
        }
    }

    public function addRow(): void
    {
        $this->form['formDataType'][] = [];
    }

    public function addRowInTable($index): void
    {
        $this->form['formDataType'][$index]['table'][] = [];
    }

    public function removeRow($index): void
    {
        if (isset($this->form['formDataType'][$index])) {
            $formDataType = $this->form['formDataType'][$index];

            $this->deleteRowFromDb($formDataType);
            $formDataTypeCollection = collect($this->form['formDataType']);
            $formDataTypeCollection->forget($index);

            $this->form['formDataType'] = $formDataTypeCollection->values()->all();
        }
    }

    public function removeRowInTable($index, $childIndex): void
    {
        if (isset($this->form['formDataType'][$index]['table'][$childIndex])) {
            $formDataType = $this->form['formDataType'][$index]['table'][$childIndex];

            $this->deleteRowFromDb($formDataType);
            $formDataTypeCollection = collect($this->form['formDataType'][$index]['table']);
            $formDataTypeCollection->forget($childIndex);

            $this->form['formDataType'][$index]['table'] = $formDataTypeCollection->values()->all();
        }
    }


    public function save()
    {
//        $validatedData = $this->validate();
//        DB::transaction(function () use ($validatedData) {
//            if (!empty($this->existingForm)) {
//                $this->existingForm->update($validatedData['form']);
//                $form = $this->existingForm;
//            } else {
//                $form = SipharishFormType::create($validatedData['form'] + [
//                        'created_by' => auth()->id()
//                    ]);
//            }
//            $existingFormFieldsId = collect($form->sipharisFormFields?->pluck('id'));
//            $newId = collect();
//            foreach ($validatedData['form']['formDataType'] as $formDataType) {
//                if (array_key_exists('id', $formDataType) && !empty($formDataType['id'])) {
//                    $formDataTypeData = SipharisFormField::find($formDataType['id']);
//                    $formDataTypeData->update($formDataType);
//                } else {
//                    $formDataTypeData = $form->sipharisFormFields()->create($formDataType + [
//                            'created_by' => auth()->id()
//                        ]);
//                }
//
//                if ($formDataType['type'] == 'table' && !empty($formDataType['table'])) {
//                    foreach ($formDataType['table'] as $table) {
//                        if (array_key_exists('id', $table) && !empty($table['id'])) {
//                            $tableData = SipharisFormField::find($table['id']);
//                            $tableData?->update($table);
//                        } else {
//                            $tableData = $formDataTypeData->SipharishFormFields()->create($table + [
//                                    'created_by' => auth()->id()
//                                ]);
//                        }
//                    }
//                }
//                $newId->push($formDataTypeData->id);
//            }
//            $diff = $existingFormFieldsId->diff($newId->filter());
//
//            SipharisFormField::whereIn('id', $diff->toArray())->delete();
//        });
//
//        $this->reset('form');
//        toast('सफलतापूर्वक थपियो', 'success');
//        return redirect(route('admin.recommendation.sipharish.sipharishFormType.index'));
    }

    public function render()
    {
        return view('livewire.sipharish-form-type-livewire');
    }

    /**
     * @param mixed $formDataType
     * @return void
     */
    public function deleteRowFromDb(mixed $formDataType): void
    {
        if (isset($formDataType['id'])) {
            $formDataTypeRecord = SipharisFormField::find($formDataType['id']);
            if ($formDataTypeRecord) {
                $formDataTypeRecord->delete();
            }
        }
    }
}
