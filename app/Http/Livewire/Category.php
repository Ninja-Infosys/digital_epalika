<?php

namespace App\Http\Livewire;

use  Modules\Recommendation\Entities\SipharisCategory;
use  Modules\Recommendation\Entities\SipharisSubCategory;

use Livewire\Component;

class Category extends Component
{
    public $province_id = '';

    public $sipharis_category_id = null;

    public $sipharis_sub_category_id = '';

    public $district_id = '';

    public $local_body_id = '';

    public $ward_no = '';

    public $provinces = [];

    public $districts = [];

    public $localBodies = [];

    public $wards = '';

    public $sipharishCategories = [];
    public $sipharishSubCategories = [];

    public $selectedCategory = null;

    public function mount($categorySubCategory = null)
    {

        if (!empty($categorySubCategory)) {
            $this->sipharis_category_id = $categorySubCategory['sipharis_category_id'] ?? '';
            $this->sipharis_sub_category_id = $categorySubCategory['sipharis_sub_category_id'] ?? '';
          
        }
    }

    public function render()
    {
        if (!empty($this->sipharis_category_id)) {
            $this->sipharishSubCategories = SipharisSubCategory::getSipharisSubCategoryByCategoryId($this->sipharis_category_id);
        }

       
        $this->sipharishCategories = SipharisCategory::getActiveSipharis();
        $this->sipharishSubCategories = SipharisSubCategory::select('id','title','sipharis_category_id')->get();
        

        return view('livewire.category');
    }

    public function upSelectedCategory($id){
        $this->sipharishSubCategories = SipharisSubCategory::select('id','title','sipharis_category_id')->where('sipharis_category_id',$this->sipharis_category_id)->get();
    }
}
