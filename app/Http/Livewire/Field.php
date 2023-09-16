<?php

namespace App\Http\Livewire;

use  Modules\Recommendation\Entities\SipharisCategory;
use  Modules\Recommendation\Entities\SipharisFormFields;
use  Modules\Recommendation\Entities\SipharisSubCategory;
use  Modules\Recommendation\Entities\SipharisFormType;
use Log;
use Livewire\Component;

class Field extends Component
{

    public $sipharis_category_id = null;

    public $sipharis_sub_category_id = '';

    public $sipharishCategories = [];
    public $sipharishSubCategories = [];
    public $siharisFormFields = [];
    public $sipharisFormTypes = [];
    public $formTypes = [];

    public $fields = [];

    public $selectedCategory = null;
    public $selectedFormType = null;
    public $selectedSubcategory = null;

    public function mount($categorySubCategory = null)
    {

        if (!empty($categorySubCategory)) {
            $this->sipharis_category_id = $categorySubCategory['sipharis_category_id'] ?? '';
            $this->sipharis_sub_category_id = $categorySubCategory['sipharis_sub_category_id'] ?? '';
          
        }
        $this->sipharishCategories = SipharisCategory::getActiveSipharis();
    }

    public function render()
    {
       if(!empty($this->selectedCategory)){
        $this->sipharishSubCategories = SipharisSubCategory::getSipharisSubCategoryByCategoryId($this->selectedCategory);
       }

       if(!empty($this->selectedFormType)){
        $this->fields = SipharisFormFields::getFormFieldByFormType($this->selectedFormType);
       }

       if(!empty($this->selectedSubcategory)){
        $this->formTypes = SipharisFormType::getAllFormTypeBySubCategory($this->selectedSubcategory);
       }
        //$this->sipharishCategories = SipharisCategory::getActiveSipharis();
       // $this->sipharishSubCategories = SipharisSubCategory::getSipharisSubCategoryByCategoryId();
       // $this->fields = SipharisFormFields::getFormFieldByFormType(1);
        //$this->formTypes = SipharisFormType::getAllFormTypeBySubCategory(1);

        return view('livewire.field');
    }

    public function updatedSelectedCategory($id){
        //dd($id);
        $this->sipharishSubCategories = SipharisSubCategory::getSipharisSubCategoryByCategoryId($id);
       
    }

    public function updatedSelectedSubcategory($value){
        $this->formTypes = SipharisFormType::getAllFormTypeBySubCategory($value);
    }

    public function updatedSelectedFormType($id){
        Log::info("Update Name field with {$id} ");
        if(!is_null($id)){
        $this->fields = SipharisFormFields::getFormFieldByFormType($id);
        }
        //dd($this->fields);
    }
}
