<?php

namespace Modules\Recommendation\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Recommendation\Entities\SipharisCategory;
use Modules\Recommendation\Entities\SipharisSubCategory;
use Modules\Recommendation\Entities\SipharishFormType;
use Modules\Recommendation\Entities\SipharisFormFields;
use Modules\Recommendation\Entities\SipharishCreate;
use Modules\Recommendation\Entities\SipharishCreatedValue;
use Modules\Recommendation\Http\Requests\SipharishCreated\StoreSipharisCreatedRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Recommendation\Entities\PersonalDetail;


class SipharisCreateController extends Controller
{

    public function index(){
        $this->checkAuthorization('recommendationCategory_access');
        $sipharishs = SipharishCreate::with('formTypes')->get();
        //dd($sipharishs);
        return view('recommendation::admin.sipharisCreate.index', compact('sipharishs'));
    }

    public function create(){
        $sipharishCategories = SipharisCategory::all();
        $formTypes = SipharishFormType::active()->get();
        $personalDetails = PersonalDetail::all();
        return view('recommendation::admin.sipharisCreate.create',compact('formTypes'));
    }
    public function store(StoreSipharisCreatedRequest $storeSipharisCreatedRequest){
        //dd($storeSipharisCreatedRequest->all());
            \DB::beginTransaction();
           $filter =  $storeSipharisCreatedRequest->only('sipharis_form_type_id','personal_detail_id','status');
            $formType = $storeSipharisCreatedRequest->validated()['field'];
            $files = $storeSipharisCreatedRequest->validated()['files'];
//dd($files);
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

            if($files && $files[0]['file_name'] != Null){
            foreach($files ?? [] as $file){
            $doc = $file['file'] ?? '';
            $filePath = $doc->store('recommendation_file/' . Str::slug($sipharis->id), 'public');
                $sipharis->sipharisDocuments()->create([
                    'sipharish_create_id'=>$sipharis->id,
                    'title'=>$file['file_name'],
                    'filename'=>$filePath,
                    'extension' => $file['file']->getClientOriginalExtension()
                    ]);
            }
        }
            }else{
            toast('सिफारिस सफलतापूर्वक थपियो', 'error');
            \DB::rollback();
            }
            \DB::commit();
            toast('सिफारिस सफलतापूर्वक थपियो', 'success');
            return back();

        
    }

    public function edit(SipharishCreate $sipharishCreate)
    {
        return view('recommendation::admin.sipharisCreate.edit', compact('sipharishCreate'));
    }

    public function show($id)
    {

        $formFields = SipharishFormType::select('sipharis_form_fields.field_name','sipharish_created_values.value')
                        ->leftjoin('sipharis_form_fields','sipharis_form_fields.sipharish_form_type_id','sipharish_form_types.id')
                        ->leftjoin('sipharish_created_values','sipharish_created_values.sipharish_form_fields_id','sipharis_form_fields.id')
                        ->leftjoin('sipharish_creates','sipharish_creates.sipharis_form_type_id','sipharish_form_types.id')
                        ->where(['sipharish_creates.id'=>$id,'sipharish_created_values.sipharish_create_id'=>$id])
                        ->get();
        
        $sipharisInfos = SipharishCreate::with(['formTypes','sipharisDocuments'])->where('id',$id)->first();
        
        return view('recommendation::admin.sipharisCreate.view',compact('formFields','sipharisInfos'));

    }

    public function updateStatus(SipharishCreate  $sipharishCreate)
    {
        $this->checkAuthorization('recommendationTemplate_access');
       
       // $getSipharisCategory = $sipharisModel->find($sipharisModel->id);
        $sipharishCreate->update([
            'status' => !$sipharishCreate->status
        ]);
        toast('टेम्प्लेट स्थिति सफलतापूर्वक अद्यावधिक गरियो', 'success');
        return back();
    }
    public function destroy(SipharishCreate $sipharishCreate)
    {
        $this->checkAuthorization('recommendationCategory_delete');
        if ($sipharishCreate->status == 1) {
            toast('सक्रिय भएको सिफारिस प्रकार मेटाउन मनाहि छ', 'error');

            return back();
        }
        $sipharishCreate->delete();
        toast('सिफारिस सफलतापूर्वक मेटियो', 'success');
        return back();
    }

   

}