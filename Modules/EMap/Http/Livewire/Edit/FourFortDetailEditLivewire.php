<?php

namespace Modules\EMap\Http\Livewire\Edit;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\EMap\Entities\FourFort;
use Modules\EMap\Entities\MapApply;

class FourFortDetailEditLivewire extends Component
{
    public array $fourFortDetails = [];

    public MapApply $mapApply;

    public ?int $dataToEdit = null;

    public function mount(MapApply $mapApply): void
    {
        $this->mapApply = $mapApply;

        $mapApply->load('fourForts');
        foreach ($mapApply->fourForts as $fourFort) {
            $this->fourFortDetails[] = [
                'id' => $fourFort->id ?? null,
                'detail' => $fourFort->detail->value ?? null,
                'east' => $fourFort->east ?? null,
                'south' => $fourFort->south ?? null,
                'west' => $fourFort->west ?? null,
                'north' => $fourFort->north ?? null,
            ];
        }
    }

    public function rules(): array
    {
        if ($this->dataToEdit === null) {
            return [];
        }

        return [
            'fourFortDetails' => ['required', 'array'],
            'fourFortDetails.'.$this->dataToEdit.'.detail' => ['required'],
            'fourFortDetails.'.$this->dataToEdit.'.east' => ['required'],
            'fourFortDetails.'.$this->dataToEdit.'.south' => ['required'],
            'fourFortDetails.'.$this->dataToEdit.'.west' => ['required'],
            'fourFortDetails.'.$this->dataToEdit.'.north' => ['required'],
        ];
    }

    public function setDataForEdit(?int $index = null): void
    {
        $this->dataToEdit = $index;
    }

    public function saveFormData()
    {
        if ($this->dataToEdit !== null) {
            $this->validate();
            DB::transaction(function () {
                $dataToSave = $this->fourFortDetails[$this->dataToEdit];

                if (! empty($dataToSave['id'])) {
                    FourFort::find($dataToSave['id'])?->update($dataToSave);
                }
            });

            $this->reset('dataToEdit');

            $this->dispatchBrowserEvent('alert_message', [
                'type' => 'success',
                'title' => 'धन्यबाद',
                'text' => 'तपाईको फारम सफलतापूर्वक दर्ता भयो',
            ]);
        }
    }

    public function messages(): array
    {
        return [
            'fourFortDetails.required' => 'चार किल्लाको विवरण अनिवार्य छ|',
            'fourFortDetails.*.east.required' => 'पूर्व दिशा अनिवार्य छ|',
            'fourFortDetails.*.south.required' => 'दक्षिण दिशा अनिवार्य छ|',
            'fourFortDetails.*.west.required' => 'पश्चिम दिशा अनिवार्य छ|',
            'fourFortDetails.*.north.required' => 'उत्तर दिशा अनिवार्य छ|',
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('emap::livewire.edit.four-fort-detail-edit-livewire');
    }
}
