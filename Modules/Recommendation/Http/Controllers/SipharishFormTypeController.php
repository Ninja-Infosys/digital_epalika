<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Traits\NepaliDateConverter;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisSubCategory;
use Modules\Recommendation\Entities\SipharishFormType;
use Modules\Recommendation\Entities\SipharisFormFields;
use Modules\Recommendation\Http\Requests\SipharisFormType\StoreSipharisFormTypeRequest;
use Modules\Recommendation\Http\Requests\SipharisCategory\StoreSipharisCategoryRequest;
use Modules\Recommendation\Http\Requests\SipharisCategory\UpdateSipharisCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class SipharishFormTypeController extends Controller
{
    use NepaliDateConverter;

    public function index(){
        $this->checkAuthorization('recommendationCategory_access');
        $sipharishFormTypes = SipharishFormType::with("subCategories")->get();
        //$sipharishFormTypes = SipharishFormType::getSipharisFormTypes();
        return view('recommendation::admin.sipharisFormType.index', compact('sipharishFormTypes'));
    }

    public function create(){
        //$sipharishCategories = SipharisCategory::all();
        return view('recommendation::admin.sipharisFormType.create');
    }
    public function store(StoreSipharisFormTypeRequest $sipharishStoreRequest){
        
            \DB::beginTransaction();
           $filter =  $sipharishStoreRequest->only('title','sipharis_sub_category_id','content','need_approval','status');
            $formType = $sipharishStoreRequest->validated()['field'];
            $sipharis = SipharishFormType::create($filter +[
            'created_by' => auth()->id()
            ]);
            if($sipharis){
            foreach($formType as $data){
            //dd($data);die;
            $sipharis->formFields()->create([
                'sipharish_form_type_id'=>$sipharis->id,
                'field_name'=>$data['field_name'],
                'status'    =>$data['status'] ?? true,
                'created_by' => auth()->id(),
                ]);
            }
            }else{
            toast('सिफारिस सफलतापूर्वक थपियो', 'error');
            \DB::rollback();
            }
            \DB::commit();
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
            return back();

        
    }

    public function edit(SipharishFormType $sipharishFormType){
        \DB::beginTransaction();
        //$sipharishFormType = SipharishFormType::find($sipharisFormTypeModel->id);
        $sipharishCategories = SipharisCategory::all();
        $sipharishSubCategories = SipharisSubCategory::all();
        $fields = $sipharishFormType->with('formFields')->where('id',$sipharishFormType->id)->first();
        return view('recommendation::admin.sipharisFormType.edit',
        compact('sipharishFormType','sipharishCategories','fields','sipharishSubCategories'));

    }
    public function update(StoreSipharisFormTypeRequest $sipharishStoreRequest,SipharishFormType $sipharishFormType){
        $formType = $sipharishStoreRequest->validated()['field'];
        $data = $sipharishStoreRequest->only('title','sipharis_sub_category_id','content','need_approval','status');
        $this->checkAuthorization('recommendationCategory_edit');
        $type = $sipharishFormType->update($data);
        if($type){
            foreach($formType as $formData){
            $saveOrUpdate = $sipharishFormType->formFields()->updateOrCreate(
                ['id'=>$formData['id']],
                [
                'field_name'=>$formData['field_name'],
                'status'    =>$formData['status'] ?? 1,
                'created_by' => auth()->id()
                ]
            );
            
            }
        }else{
            toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'error');
            return back();
            \DB::rollback();
        }
        \DB::commit();
        toast('सिफारिस सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatus(SipharishFormType $sipharisFormType)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
        $sipharisFormType->update([
            'status' => !$sipharisFormType->status
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function destroy(SipharishFormType $sipharishFormType)
    {
        $this->checkAuthorization('recommendationCategory_delete');
        if ($sipharishFormType->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $sipharishFormType->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }

}