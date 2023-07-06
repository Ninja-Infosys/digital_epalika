<?php

namespace Modules\Identity\Http\Livewire;

use Livewire\Component;
use Modules\Identity\Entities\DisabilityIdentityCard;

class SearchDisabilityIdentityCitizenshipLivewire extends Component
{
    public $citizenship_no = null;

    protected $rules = [
        'citizenship_no' => ['required']
    ];

    public function searchCitizenshipNo()
    {
        $this->validate();

        if ($disabilityIdentityCard = DisabilityIdentityCard::where('citizenship_no', $this->citizenship_no)->first()) {
            return redirect(route('identity.admin.disabilityIdentityCard.show', $disabilityIdentityCard));
        } else {
            $this->dispatchBrowserEvent('toast_message', [
                'type' => 'error',
                'title' => 'नागरिकता नं. फेला परेन'
            ]);
            return redirect(route('identity.admin.disabilityIdentityCard.create', ['citizenship_no' => $this->citizenship_no]));
        }
    }

    public function render()
    {
        return view('identity::livewire.search-disability-identity-citizenship-livewire');
    }
}
