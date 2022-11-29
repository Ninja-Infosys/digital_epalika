<?php

namespace Modules\Plan\Http\Livewire;

use Livewire\Component;

class InstallmentDetailLivewire extends Component
{
    public $installmentDetails=[];

    public bool $createModalOpened=false;

    public array $form=[
        'installment_type'=>null,
        'date'=>null,
        'amount'=>null,
        'construction_material_quantity'=>null,
        'remarks'=>null
    ];

    public function openCreateModal()
    {
        $this->createModalOpened=true;
    }

    public function closeModal()
    {
        $this->createModalOpened=false;
    }

    public function render()
    {
        return view('plan::livewire.installment-detail-livewire');
    }
}
