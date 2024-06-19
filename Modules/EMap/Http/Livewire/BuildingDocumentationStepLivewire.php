<?php

namespace Modules\EMap\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\BuildingFormDataType;
use Modules\EMap\Entities\DynamicForm;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\FormDataType;
use Modules\EMap\Entities\MapPassGroup;
use Modules\EMap\Enums\FormTypeEnum;

class BuildingDocumentationStepLivewire extends Component
{
    public $formData;
    public array $form = [
        'title' => null,
        'order' => null,
        'map_pass_group_id' => null,
        'map_group_id' => null,
        'need_from' => null,
        'formDataType' => [],
        'show_to_consultancy' => null

    ];
    public $mapPassGroups = [];
    public $existingForm = null;

    public function mount($formData = null)
    {
        $this->mapPassGroups = MapPassGroup::all();

        if (!empty($formData)) {
            $this->existingForm = $formData;
            $this->form['title'] = $formData->title;
            $this->form['order'] = $formData->order;
            $this->form['map_pass_group_id'] = $formData->map_pass_group_id;
            $this->form['map_group_id'] = $formData->map_group_id;
            $this->form['need_from'] = $formData->need_from->value;
            $this->form['show_to_consultancy'] = $formData->show_to_consultancy;

            foreach ($formData->buildingFormDataTypes as $index => $buildingFormDataType) {
                $this->form['buildingFormDataType'][] = [
                    'id' => $buildingFormDataType->id ?? null,
                    'type' => $buildingFormDataType->type ?? null,
                    'model_id' => $buildingFormDataType->model_id ?? null,
                    'data' => $this->resolveData($buildingFormDataType->type->value) ?? null,

                ];
            }
        } else {
            $this->form['buildingFormDataType'][] = [[]];
        }
    }

    public function addData(): void
    {
        $this->form['buildingFormDataType'][] =   [];
    }

    public function removeData($index): void
    {
        if (isset($this->form['buildingFormDataType'][$index])) {
            $buildingFormDataType = $this->form['buildingFormDataType'][$index];

            if (isset($buildingFormDataType['id'])) {
                $buildingFormDataTypeRecord = BuildingFormDataType::find($buildingFormDataType['id']);
                if ($buildingFormDataTypeRecord) {
                    $buildingFormDataTypeRecord->delete();
                }
            }
            $buildingFormDataTypeCollection = collect($this->form['buildingFormDataType']);
            $buildingFormDataTypeCollection->forget($index);

            $this->form['buildingFormDataType'] = $buildingFormDataTypeCollection->values()->all();
        }
    }

    public function changeData($index): void
    {
        $this->form['buildingFormDataType'][$index]['data'] = $this->resolveData($this->form['buildingFormDataType'][$index]['type']);
        $this->form['buildingFormDataType'][$index]['data'] = $this->resolveData($this->form['buildingFormDataType'][$index]['type']);
        $this->form['buildingFormDataType'][$index]['model_id'] = null;
    }

    public function resolveData($type)
    {
        return match ($type) {
            FormTypeEnum::FILE->value => EMapTemplate::where('status', 1)->pluck('title', 'id'),
            default => null
        };
    }

    protected $rules = [
        "form.title" => ['required'],
        "form.order" => ['nullable'],
        "form.map_pass_group_id" => ['nullable', 'integer', 'exists:map_pass_groups,id,deleted_at,NULL'],
        "form.map_group_id" => ['required', 'integer', 'exists:map_pass_groups,id,deleted_at,NULL'],
        "form.need_from" => ['required'],
        'form.show_to_consultancy' => ['required_if:form.need_from,==,office'],
        "form.buildingFormDataType" => ['required', 'array'],
        "form.buildingFormDataType.*.type" => ['required'],
        "form.buildingFormDataType.*.model_id" => ['nullable', 'int'],
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
                foreach ($this->form['buildingFormDataType'] as $buildingFormDataType) {
                    if (array_key_exists('id', $buildingFormDataType)) {
                        $buildingFormDataTypeData = BuildingFormDataType::find($buildingFormDataType['id']);
                        $buildingFormDataTypeData->update($buildingFormDataType);
                    } else {
                        $buildingFormDataTypeData = $form->buildingFormDataTypes()->create($buildingFormDataType);
                    }
                }
            } else {
                $form = BuildingDocumentationStep::create($validatedData['form']);
                foreach ($this->form['buildingFormDataType'] as $buildingFormDataType) {
                    $buildingFormDataTypeData = $form->buildingFormDataTypes()->create($buildingFormDataType);
                }
            }
        });
        $this->reset('form');
        toast('सफलतापूर्वक थपियो', 'success');
        return redirect()->route('emap.admin.buildingDocumentationStep.index');
    }


    public function render()
    {
        if ($this->form['need_from'] != \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE->value) {
            $this->form['show_to_consultancy'] = 1;
        }
        return view('emap::livewire.building-documentation-step-livewire');


    }
}
