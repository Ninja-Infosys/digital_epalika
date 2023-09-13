<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Traits\NepaliDateConverter;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Http\Requests\SipharisCategory\StoreSipharisCategoryRequest;
use Modules\Recommendation\Http\Requests\SipharisCategory\UpdateSipharisCategoryRequest;
use Illuminate\Support\Facades\DB;

class SipharishCategoryController extends Controller
{
    use NepaliDateConverter;

    public function index(){
        $this->checkAuthorization('recommendationCategory_access');
        $recommendationCategories = SipharisCategory::all();
        return view('recommendation::admin.sipharishCategory.index', compact('recommendationCategories'));
    }

    public function create(){
        $this->checkAuthorization('recommendationCategory_create');
        return view('recommendation::admin.sipharishCategory.create');
    }
    public function store(StoreSipharisCategoryRequest $sipharishStoreRequest,SipharisCategory $sipharisModel){
        $this->checkAuthorization('recommendationCategory_create');
        SipharisCategory::create($sipharishStoreRequest->validated() +[
            'created_by' => auth()->id(),
            'status'=>'active'
            ]);
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(SipharisCategory $sipharisModel){
        $this->checkAuthorization('recommendationCategory_edit');
        $sipharisCategory = SipharisCategory::find($sipharisModel->id);
        return view('recommendation::admin.sipharishCategory.edit',compact('sipharisCategory','sipharisModel'));

    }
    public function update(UpdateSipharisCategoryRequest $sipharishUpdateRequest,SipharisCategory $sipharisModel){
        $this->checkAuthorization('recommendationCategory_edit');
        $sipharisModel->update($sipharishUpdateRequest->validated());
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatus($sipharisCategory)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
        $getSipharisCategory = SipharisCategory::find($sipharisCategory);
        if($getSipharisCategory->status == 'active'){
            $getSipharisCategory->update(['status'=>'inactive']);
        }else{
            $getSipharisCategory->update(['status'=>'active']);
        }
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

}