<?php

namespace Modules\HelpDesk\Http\Livewire;

use Livewire\Component;

class ServiceDocument extends Component
{
    public $serviceDocuments = [];

    public function mount($service = null)
    {
        if (!empty($service)) {
            foreach ($service->serviceDocuments as $serviceDocument) {
                $this->serviceDocuments[] = [
                    'id' => $serviceDocument->id,
                    'description' => $serviceDocument->description
                ];
            }
        } else {
            $this->serviceDocuments[] = [];
        }
    }

    public function addRow()
    {
        $this->serviceDocuments[] = [];
    }

    public function removeRow($index)
    {
        if (array_key_exists('id', $this->serviceDocuments)) {
            dd('yeas');
            ServiceDocument::find($this->serviceDocuments[$index]['id'])->delete();
        }
        unset($this->serviceDocuments[$index]);
        $this->serviceDocuments = array_values($this->serviceDocuments);
    }

    public function render()
    {
        return view('helpdesk::livewire.service-document');
    }
}
