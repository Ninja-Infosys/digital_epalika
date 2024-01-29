<?php

namespace Modules\Recommendation\Http\Livewire;

use App\Models\MobileUser;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\EMap\Entities\FormDataType;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisFormField;
use Modules\Recommendation\Entities\SipharishCreate;
use Modules\Recommendation\Entities\SipharishFormType;
use Modules\Recommendation\Entities\SipharisSubCategory;

class CreateRecommendationLivewire extends Component
{
    use WithFileUploads;

    public $mobileUsers = [];
    public $form = [
        'sipharis_form_type_id' => null,
        'mobile_user_id' => null,
        'sipharis_category_id' => null,
        'sipharis_sub_category_id' => null,
        'SipharishCreatedValues' => []
    ];

    public $recommendationCategories = [];
    public $recommendationSubCategories = [];
    public $recommendations = [];
    public $recommendationFormFields = [];

    public function mount()
    {
        $this->mobileUsers = MobileUser::latest()->get();
        $this->recommendationCategories = SipharisCategory::get();
    }

    public function render()
    {
        if (!empty($this->form['sipharis_category_id'])) {
            $this->recommendationSubCategories = SipharisSubCategory::where('sipharis_category_id', $this->form['sipharis_category_id'])
                ->latest()
                ->get();
        }
        if (!empty($this->form['sipharis_sub_category_id'])) {
            $this->recommendations = SipharishFormType::where('sipharis_sub_category_id', $this->form['sipharis_sub_category_id'])
                ->latest()
                ->get();
        }
        if (!empty($this->form['sipharis_form_type_id'])) {
            $this->recommendationFormFields = SipharisFormField::where('sipharish_form_type_id', $this->form['sipharis_form_type_id'])
                ->latest()
                ->get();
        }

        return view('recommendation::livewire.create-recommendation-livewire');
    }
}
