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
    public function store(StoreSipharisCategoryRequest $sipharishStoreRequest,SipharisCategory $sipharishCategory){
        $this->checkAuthorization('recommendationCategory_create');
        SipharisCategory::create($sipharishStoreRequest->validated() +[
            'created_by' => auth()->id(),
            'status'=>true
            ]);
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(SipharisCategory $sipharishCategory){
        $this->checkAuthorization('recommendationCategory_edit');
        $getSipharisCategory = SipharisCategory::find($sipharishCategory->id);
        return view('recommendation::admin.sipharishCategory.edit',compact('sipharishCategory','getSipharisCategory'));

    }
    public function update(UpdateSipharisCategoryRequest $sipharishUpdateRequest,SipharisCategory $sipharishCategory){
        $this->checkAuthorization('recommendationCategory_edit');
        $sipharishCategory->update($sipharishUpdateRequest->validated());
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatus(SipharisCategory  $sipharisModel)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
       // $getSipharisCategory = $sipharisModel->find($sipharisModel->id);
        $sipharisModel->update([
            'status' => !$sipharisModel->status
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(SipharisCategory $sipharishCategory)
    {
        $this->checkAuthorization('recommendationCategory_delete');
        if ($sipharishCategory->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $sipharishCategory->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }

}