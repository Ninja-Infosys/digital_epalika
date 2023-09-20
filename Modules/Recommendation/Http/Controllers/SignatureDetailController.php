<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisSignatureDetail;
use Modules\Recommendation\Http\Requests\SignatureDetail\StoreSignatureRequest;
use Modules\Recommendation\Http\Requests\SignatureDetail\UpdateSignatureRequest;
use Illuminate\Support\Facades\DB;

class SignatureDetailController extends Controller
{

    public function index(){
        $signatureDetails = SipharisSignatureDetail::all();
        return view('recommendation::admin.signatureDetail.index', compact('signatureDetails'));
    }

    public function create(){
        return view('recommendation::admin.signatureDetail.create');
    }
    public function store(StoreSignatureRequest $signatureStoreRequest)
    {
       // dd($signatureStoreRequest->all());
        $this->checkAuthorization('recommendationCategory_create');
        
        SipharisSignatureDetail::create($signatureStoreRequest->validated() +[
            'created_by' => auth()->id(),
            'status'=>true
            ]);
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
        return back();
    }

    public function edit(SipharisSignatureDetail $sipharishSignature){
        $this->checkAuthorization('recommendationCategory_edit');
        $getSignature = $sipharishSignature;
        return view('recommendation::admin.signatureDetail.edit',compact('getSignature','sipharishSignature'));

    }
    public function update(UpdateSignatureRequest $signatureUpdateRequest,SipharisSignatureDetail $sipharishSignature)
    {
        if ($signatureUpdateRequest->hasFile('signature') && $sipharishSignature->getRawOriginal('signature')) {
            $this->deleteFile($sipharishSignature->getRawOriginal('signature'));
        }
        $this->checkAuthorization('recommendationCategory_edit');
        $sipharishSignature->update($signatureUpdateRequest->validated());
        toast('सिफारिस हस्ताक्षर अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatus(SipharisSignatureDetail $sipharishSignature)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
        $sipharishSignature->update([
            'status' => !$sipharishSignature->status
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
    public function destroy(SipharisSignatureDetail $sipharishSignature)
    {
        $this->checkAuthorization('recommendationCategory_delete');
        if ($sipharishSignature->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $sipharishSignature->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }

}