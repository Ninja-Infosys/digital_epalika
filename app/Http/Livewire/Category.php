<?php

namespace App\Http\Livewire;

use  Modules\Recommendation\Entities\SipharisCategory;
use  Modules\Recommendation\Entities\SipharisSubCategory;

use Livewire\Component;

class Category extends Component
{

    public $sipharis_category_id = null;

    public $sipharis_sub_category_id = '';

    public $sipharishCategories = [];
    public $sipharishSubCategories = [];

    public $selectedCategory = null;

    public function mount($categorySubCategory = null)
    {

        if (!empty($categorySubCategory)) {
            $this->sipharis_category_id = $categorySubCategory['sipharis_category_id'] ?? '';
            $this->sipharis_sub_category_id = $categorySubCategory['sipharis_sub_category_id'] ?? '';
        }
        $this->sipharishCategories = SipharisCategory::active()->get();
        $this->sipharishSubCategories = SipharisSubCategory::active()->get();
    }

    public function render()
    {


        if (!empty($this->selectedCategory)) {
            $this->sipharishSubCategories = SipharisSubCategory::getSipharisSubCategoryByCategoryId($this->selectedCategory);
        }



        return view('livewire.category');
    }

    public function updatedSelectedCategory($id)
    {
        $this->sipharishSubCategories = SipharisSubCategory::getSipharisSubCategoryByCategoryId($id);
    }
}
