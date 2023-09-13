<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Traits\NepaliDateConverter;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisSubCategory;
use Modules\Recommendation\Http\Requests\SipharisSubCategory\StoreSipharisSubCategoryRequest;
use Modules\Recommendation\Http\Requests\SipharisSubCategory\UpdateSipharisCategoryRequest;
use Illuminate\Support\Facades\DB;

class SipharisSubCategoryController extends Controller
{
    use NepaliDateConverter;

    public function index(){
        $this->checkAuthorization('recommendationCategory_access');
        $sipharisSubCategories = SipharisSubCategory::select('sipharis_sub_category.title as sub_category_title','sipharis_sub_category.id as id','sipharis_category.title as category_title','sipharis_sub_category.status')
                                    ->leftJoin('sipharis_category','sipharis_category.id','sipharis_sub_category.sipharis_category_id')
                                    ->get();
        return view('recommendation::admin.sipharishSubCategory.index', compact('sipharisSubCategories'));
    }

    public function create(){
        $this->checkAuthorization('recommendationCategory_create');
        $sipharisCategories = SipharisCategory::getActiveSipharis();
        return view('recommendation::admin.sipharishSubCategory.create',compact('sipharisCategories'));
    }
    public function store(StoreSipharisSubCategoryRequest $storeSipharisSubCategoryRequests,SipharisSubCategory $SipharisSubCategoryModel){
        $this->checkAuthorization('recommendationCategory_create');
        SipharisSubCategory::create($storeSipharisSubCategoryRequests->validated() +[
            'created_by' => auth()->id(),
            'status'=>'active'
            ]);
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(SipharisSubCategory $siphariSubsModel){
        $this->checkAuthorization('recommendationCategory_edit');
        $sipharisSubCategory = SipharisSubCategory::find($siphariSubsModel->id);
        $sipharisCategories = SipharisCategory::getActiveSipharis();

        return view('recommendation::admin.sipharishSubCategory.edit',compact('sipharisSubCategory','sipharisCategories','siphariSubsModel'));

    }
    public function update(StoreSipharisSubCategoryRequest $sipharishUpdateRequest,SipharisSubCategory $siphariSubsModel){
        $this->checkAuthorization('recommendationCategory_edit');
        $siphariSubsModel->update($sipharishUpdateRequest->validated());
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatus($sipharisSubCategory)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
        $getSipharisSubCategory = SipharisSubCategory::find($sipharisSubCategory);
        if($getSipharisSubCategory->status == 'active'){
            $getSipharisSubCategory->update(['status'=>'inactive']);
        }else{
            $getSipharisSubCategory->update(['status'=>'active']);
        }
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

}