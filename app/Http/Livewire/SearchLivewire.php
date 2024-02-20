<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Recommendation\Entities\SipharishFormType;

class SearchLivewire extends Component
{

    public $search;
    public $sipharisForms;


    public function render()
    {

        $this->sipharisForms = SipharishFormType::where('title', 'like', '%' . $this->search . '%')->get();

        return view('livewire.search-livewire');
    }
}
