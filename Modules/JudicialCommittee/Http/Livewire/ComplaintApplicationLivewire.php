<?php

namespace Modules\JudicialCommittee\Http\Livewire;

use App\Models\Address\Province;
use Livewire\Component;

class ComplaintApplicationLivewire extends Component
{
    public $provinces=[];

    public array $form=[
        'complainant_province_id'=>null,
        'complainant_district_id'=>null,
    ];

    public function mount()
    {
        $this->provinces=Province::all();
    }

    public function render()
    {
        return view('judicialcommittee::livewire.complaint-application-livewire');
    }
}
