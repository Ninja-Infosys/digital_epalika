<?php

namespace Modules\EMap\Http\Livewire;

use Livewire\Component;

class OrganizationRegisterLivewire extends Component
{
    public $level = 1;

    public $form = [
        'name' => null
    ];

    public function incrementLevel()
    {

        if ($this->level <= 4) {
            $this->level++;
        }

    }

    public function save()
    {

    }

    public function resetForm()
    {
        $this->reset('form', 'level');

    }

    public function decrementLevel()
    {
        if ($this->level >= 1) {
            $this->level--;
        }

    }

    public function render()
    {
        return view('emap::livewire.organization-register-livewire');
    }
}
