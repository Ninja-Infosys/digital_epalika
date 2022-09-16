<?php

namespace Modules\Circular\Http\Livewire;

use Livewire\Component;
use Modules\Circular\Entities\Dispatch;

class DispatchReport extends Component
{

    public $search;
    public $dispatches = [];




    public function render()
    {
        $this->dispatches = Dispatch::where(function ($query){
            if(!empty($this->search)){
                $query->where('dispatch_no',$this->search);
                $query->where('dispatch_date',$this->search);
            }
        })->latest()->get();
        return view('circular::livewire.dispatch-report');
    }
}
