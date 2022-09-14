<?php

namespace App\Http\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Livewire\Component;

class Address extends Component
{
    public $province_id = '';
    public $district_id = '';
    public $local_body_id = '';
    public $ward_no = '';

    public $provinces = [];
    public $districts = [];
    public $localBodies = [];
    public $wards = '';

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function render()
    {
        if (!empty($this->province_id)) {
            $this->districts = Province::with('districts')->findOrFail($this->province_id)->districts;
        }
        if (!empty($this->district_id)) {
            $this->localBodies = District::with('localBodies')->findOrFail($this->district_id)->localBodies;
        }
        if (!empty($this->local_body_id)) {
            $this->wards = LocalBody::findOrFail($this->local_body_id)->wards;
        }

        return view('livewire.address');
    }
}
