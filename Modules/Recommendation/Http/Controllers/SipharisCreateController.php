<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Traits\NepaliDateConverter;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisSubCategory;
use Modules\Recommendation\Entities\SipharisFormType;
use Modules\Recommendation\Entities\SipharisFormFields;
use Modules\Recommendation\Entities\SipharisCreated;
use Modules\Recommendation\Entities\SipharisCreatedValue;
use Modules\Recommendation\Http\Requests\SipharisFormType\StoreSipharisFormTypeRequest;
use Modules\Recommendation\Http\Requests\SipharishCreated\StoreSipharisCreatedRequest;
use Modules\Recommendation\Http\Requests\SipharisCategory\StoreSipharisCategoryRequest;
use Modules\Recommendation\Http\Requests\SipharisCategory\UpdateSipharisCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Modules\Recommendation\Entities\PersonalDetail;


class SipharisCreateController extends Controller
{
    use NepaliDateConverter;

    public function index(){
        $this->checkAuthorization('recommendationCategory_access');
        $sipharishFormTypes = SipharisFormType::getSipharisFormTypes();
        return view('recommendation::admin.sipharisFormType.index', compact('sipharishFormTypes'));
    }

    public function create(){
        $sipharishCategories = SipharisCategory::all();
        $formTypes = SipharisFormType::getAllActiveFormType();
        $fields =  $this->getFormFieldsByFormType(1);
        $personalDetails = PersonalDetail::all();
        return view('recommendation::admin.sipharisCreate.create',compact('formTypes','fields'));
    }
    public function store(StoreSipharisCreatedRequest $storeSipharisCreatedRequest){
        //dd($storeSipharisCreatedRequest->all());
            \DB::beginTransaction();
           $filter =  $storeSipharisCreatedRequest->only('sipharis_form_type_id','personal_detail_id','status');
            $formType = $storeSipharisCreatedRequest->validated()['field'];
            $sipharis = SipharisCreated::create($filter +[
            'created_by' => auth()->id()
            ]);
            if($sipharis){
            foreach($formType as $data){
            //dd($data);die;
            SipharisCreatedValue::create([
                'sipharish_created_id'=>$sipharis->id,
                'sipharish_form_fields_id'=>$data['sipharish_form_fields_id'],
                'value'=>$data['value'],
                'status'    =>$data['status'] ?? 'active'
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

    public function edit(SipharisFormType $sipharisFormTypeModel){
        \DB::beginTransaction();
        $sipharishFormType = SipharisFormType::find($sipharisFormTypeModel->id);
       // dd($sipharishFormType);
        $sipharishCategories = SipharisCategory::all();
        $formFields = SipharisFormFields::getFormFieldByFormType($sipharisFormTypeModel->id);
        $getOnesipharisSubCategory = SipharisCategory::where('id',$sipharishFormType->sipharis_sub_category_id)->first();
        return view('recommendation::admin.sipharisFormType.edit',
        compact('sipharishFormType','sipharisFormTypeModel','getOnesipharisSubCategory','sipharishCategories','formFields'));

    }
    public function update(StoreSipharisFormTypeRequest $sipharishStoreRequest,SipharisFormType $sipharisFormTypeModel){
        //dd($sipharisFormTypeModel);
        $formType = $sipharishStoreRequest->validated()['field'];
        $data = $sipharishStoreRequest->only('title','sipharis_sub_category_id','content','need_approval','status');
        //dd($formType);
        $this->checkAuthorization('recommendationCategory_edit');
        $type = $sipharisFormTypeModel->update($data);
        if($type){
            foreach($formType as $data){
            //dd($data);die;
            if($data['id'] == null){
                SipharisFormFields::create([
                'sipharish_form_type_id'=>$sipharisFormTypeModel->id,
                'field_name'=>$data['field_name'],
                'status'    =>$data['status'] ?? 'active',
                'created_by' => auth()->id(),
                ]);
            }else{
                SipharisFormFields::where('id',$data['id'])->update([
                'sipharish_form_type_id'=>$sipharisFormTypeModel->id,
                'field_name'=>$data['field_name'],
                'status'    =>$data['status'] ?? 'active',
                'created_by' => auth()->id(),
                ]);
            }
            
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

    public function updateStatus($sipharishFormType)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
        $getsipharishFormType = SipharisFormType::find($sipharishFormType);
        if($getSipharisCategory->status == 'active'){
            $sipharishFormType->update(['status'=>'inactive']);
        }else{
            $sipharishFormType->update(['status'=>'active']);
        }
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
    public function getFormFieldsByFormType($id){
        $fields = SipharisFormFields::select('id','field_name')->where('sipharish_form_type_id',$id)->where('status','active')->get();
        return $fields;
    }

   

}