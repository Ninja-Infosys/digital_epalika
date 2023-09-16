<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Traits\NepaliDateConverter;
use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SignatureDetail;
use Modules\Recommendation\Http\Requests\SignatureDetail\StoreSignatureRequest;
use Modules\Recommendation\Http\Requests\SignatureDetail\UpdateSignatureRequest;
use Modules\Recommendation\Http\Requests\SipharisCategory\StoreSipharisCategoryRequest;
use Modules\Recommendation\Http\Requests\SipharisCategory\UpdateSipharisCategoryRequest;
use Illuminate\Support\Facades\DB;

class SignatureDetailController extends Controller
{
    use NepaliDateConverter;

    public function index(){
        $signatureDetails = SignatureDetail::all();
        return view('recommendation::admin.signatureDetail.index', compact('signatureDetails'));
    }

    public function create(){
        return view('recommendation::admin.signatureDetail.create');
    }
    public function store(StoreSignatureRequest $signatureStoreRequest){
        $this->checkAuthorization('recommendationCategory_create');
        if ($signatureStoreRequest->hasFile('signature')) {
        }
        SignatureDetail::create($signatureStoreRequest->validated() +[
            'created_by' => auth()->id(),
            //'status'=>'active'
            ]);
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(SignatureDetail $signatureDetail){
        $this->checkAuthorization('recommendationCategory_edit');
        $getSignature = SignatureDetail::find($signatureDetail->id);
        return view('recommendation::admin.signatureDetail.edit',compact('getSignature','signatureDetail'));

    }
    public function update(UpdateSignatureRequest $signatureUpdateRequest,SignatureDetail $signatureDetail){
        $this->checkAuthorization('recommendationCategory_edit');
        $signatureDetail->update($signatureUpdateRequest->validated());
        toast('सिफारिस हस्ताक्षर अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatus($signatureDetail)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
        $getSignature = SignatureDetail::find($signatureDetail);
        
        $getSignature->update(['status'=> $getSignature->status == 'active'? 'inactive':'active']);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }

}