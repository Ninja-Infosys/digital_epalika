<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Traits\NepaliDateConverter;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisSubCategory;
use Modules\Recommendation\Entities\SipharishFormType;
use Modules\Recommendation\Entities\SipharisFormFields;
use Modules\Recommendation\Entities\SipharishCreate;
use Modules\Recommendation\Entities\SipharishCreatedValue;
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
        $formTypes = SipharishFormType::active()->get();
        $personalDetails = PersonalDetail::all();
        return view('recommendation::admin.sipharisCreate.create',compact('formTypes'));
    }
    public function store(StoreSipharisCreatedRequest $storeSipharisCreatedRequest){
            \DB::beginTransaction();
           $filter =  $storeSipharisCreatedRequest->only('sipharis_form_type_id','personal_detail_id','status');
            $formType = $storeSipharisCreatedRequest->validated()['field'];
            $sipharis = SipharishCreate::create($filter +[
            'created_by' => auth()->id()
            ]);
            if($sipharis){
            foreach($formType as $data){
            $sipharis->formValues()->create([
                'sipharish_form_fields_id'=>$data['sipharish_form_fields_id'],
                'value'                   =>$data['value'],
                'status'                  =>$data['status'] ?? 1
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

   

}