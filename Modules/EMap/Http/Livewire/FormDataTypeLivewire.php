<?php

namespace Modules\EMap\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Modules\EMap\Entities\DynamicForm;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\New\MapPassGroup;
use Modules\EMap\Enums\EMapFormFillerTypeEnum;
use Modules\EMap\Enums\FormTypeEnum;

class FormDataTypeLivewire extends Component
{
    public $form = [];
    public $mapPassGroups = [];

    public function mount()
    {
        $this->mapPassGroups = MapPassGroup::all();
    }

    public function addData(): void
    {
        $this->form['formDataType'][] = [];
    }

    public function removeData($index): void
    {
        unset($this->form['formDataType'][$index]);
        $this->form['formDataType'] = array_values($this->form['formDataType']);
    }

    public function changeData($index): void
    {
        match ($this->form['formDataType'][$index]['type']) {
            FormTypeEnum::FILE->value => $this->form['formDataType'][$index]['data'] = EMapTemplate::where('status', 1)->pluck('title', 'id'),
            FormTypeEnum::FORM->value => $this->form['formDataType'][$index]['data'] = DynamicForm::where('status', 1)->pluck('title', 'id')
        };
        $this->form['formDataType'][$index]['model_id'] = null;

    }

    protected $rules = [
        "form.title" => ['required'],
        "form.order" => ['nullable'],
        "form.map_pass_group_id" => ['required', 'integer', 'exists:map_pass_groups,id,deleted_at,NULL'],
        "form.need_from" => ['required'],
        "form.formDataType" => ['required', 'array'],
        "form.formDataType.*.type" => ['required'],
        "form.formDataType.*.model_id" => ['required', 'int'],
    ];


    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);

    }

    public function save()
    {
        $validatedData = $this->validate();
        DB::transaction(function () use ($validatedData) {
            $form = Form::create($validatedData['form']);

            foreach ($validatedData['form']['formDataType'] as $formDataType) {
                $form->formDataTypes()->create($formDataType);
            }

        });

        $this->reset('form');
        toast('सफलतापूर्वक थपियो', 'success');
        return redirect()->route('emap.admin.form.index');

    }

    public function render()
    {
        return view('emap::livewire.form-data-type-livewire');
    }
}
