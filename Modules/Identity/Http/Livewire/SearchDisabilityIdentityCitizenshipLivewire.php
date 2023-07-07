<?php

namespace Modules\Identity\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;
use Modules\Identity\Entities\DisabilityIdentityCard;

class SearchDisabilityIdentityCitizenshipLivewire extends Component
{
    public $citizenship_no = null;
    public $is_minor = 0;

    protected $rules = [
        'citizenship_no' => ['required']
    ];


    public function searchCitizenshipNo(): Redirector|Application|RedirectResponse
    {
        $this->validate();

        $column = 'citizenship_no';

        if ($this->is_minor)
            $column = 'birth_registration_no';

        if ($disabilityIdentityCard = DisabilityIdentityCard::where($column, $this->citizenship_no)->first()) {
            return redirect(route('identity.admin.disabilityIdentityCard.show', $disabilityIdentityCard));
        } else {
            $this->dispatchBrowserEvent('toast_message', [
                'type' => 'error',
                'title' => !$this->is_minor ? "नागरिकता नं. $this->citizenship_no फेला परेन" : "जन्म दर्ता नं. $this->citizenship_no फेला परेन"
            ]);
            return redirect(route('identity.admin.disabilityIdentityCard.create', [$column => $this->citizenship_no]));
        }
    }

    public function render(): Factory|View|Application
    {
        return view('identity::livewire.search-disability-identity-citizenship-livewire');
    }
}
