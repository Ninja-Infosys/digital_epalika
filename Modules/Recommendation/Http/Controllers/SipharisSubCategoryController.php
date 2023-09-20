<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisSubCategory;
use Modules\Recommendation\Http\Requests\SipharisSubCategory\StoreSipharisSubCategoryRequest;
use Modules\Recommendation\Http\Requests\SipharisSubCategory\UpdateSipharisCategoryRequest;
use Illuminate\Support\Facades\DB;

class SipharisSubCategoryController extends Controller
{

    public function index(){
        $this->checkAuthorization('recommendationCategory_access');
        $sipharisSubCategories = SipharisSubCategory::with("categories")->get();
        return view('recommendation::admin.sipharishSubCategory.index', compact('sipharisSubCategories'));
    }

    public function create(){
        $this->checkAuthorization('recommendationCategory_create');
        $sipharisCategories = SipharisCategory::active()->get();
        return view('recommendation::admin.sipharishSubCategory.create',compact('sipharisCategories'));
    }
    public function store(StoreSipharisSubCategoryRequest $storeSipharisSubCategoryRequests,SipharisSubCategory $sipharishSubCategory){
        $this->checkAuthorization('recommendationCategory_create');
        SipharisSubCategory::create($storeSipharisSubCategoryRequests->validated() +[
            'created_by' => auth()->id(),
            'status'=>true
            ]);
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(SipharisSubCategory $sipharishSubCategory){
        $this->checkAuthorization('recommendationCategory_edit');
        $sipharisSubCategory = $sipharishSubCategory;;
        $sipharisCategories = SipharisCategory::active()->get();

        return view('recommendation::admin.sipharishSubCategory.edit',compact('sipharisSubCategory','sipharisCategories','sipharishSubCategory'));

    }
    public function update(StoreSipharisSubCategoryRequest $sipharishUpdateRequest,SipharisSubCategory $sipharishSubCategory){
        $this->checkAuthorization('recommendationCategory_edit');
        $sipharishSubCategory->update($sipharishUpdateRequest->validated());
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatus(SipharisSubCategory $sipharisSubCategory)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
        $sipharisSubCategory->update([
            'status' => !$sipharisSubCategory->status
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(SipharisSubCategory $sipharishSubCategory)
    {

        $this->checkAuthorization('recommendationCategory_delete');
        if ($sipharishSubCategory->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $sipharishSubCategory->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }

}