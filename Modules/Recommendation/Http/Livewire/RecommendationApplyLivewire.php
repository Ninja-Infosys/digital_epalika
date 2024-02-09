<?php

namespace Modules\Recommendation\Http\Livewire;

use App\Models\MobileUser;
use Illuminate\Support\Arr;
use Livewire\Component;

class RecommendationApplyLivewire extends Component
{
    public $mobileUsers = [];
    public $form = [
        'mobile_user_id' => null
    ];

    public function mount()
    {
        $this->mobileUsers = MobileUser::all();
    }

    protected $listeners = ['changeFormData' => 'changeFormData'];



    public function changeFormData($variable, $value): void
    {
        dd(Arr::undot([$variable]));
    }
    public function render()
    {
        return view('recommendation::livewire.recommendation-apply-livewire');
    }
}
