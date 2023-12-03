<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\FormStoreNotification;
use App\Notifications\PaymentStoreNotification;
use App\Notifications\StepNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\FormDataType;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Enums\DocumentStatusEnum;

class AdminStepController extends Controller
{
    public function formList(MapApply $mapApply)
    {
        $mapApply->load('houseOwner');
        $forms = Form::with('formDataTypes', 'group.users')->orderBy('order')->get();
        return view('emap::admin.step.formList', compact('mapApply', 'forms'));
    }

    public function viewDetail(MapApply $mapApply, Form $form)
    {

        $mapApply->load('houseOwner');
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments.appliedDocumentStatuses', 'formDataTypes.formStores.formStoreStatuses', 'group');
        $checkUser =  $form->group->users->pluck('id')->contains(auth()->user()->id);
        $MapGroups = DB::table('map_pass_group_user')->where('user_id', auth()->user()->id)->first() ?? null;
        $ward_no =  $MapGroups ? explode(',', $MapGroups->ward_no) : [];
        $checkAuthorization = in_array($mapApply->landDetail?->ward_no, $ward_no);



        return view('emap::admin.step.formDetail', compact('mapApply', 'form', 'checkAuthorization'));
    }

    public function fillDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments', 'formDataTypes.appliedDocuments.appliedDocumentStatuses', 'formDataTypes.formStores', 'formDataTypes.formStores.formStoreStatuses');
        return view('emap::admin.step.formFill', compact('mapApply', 'form'));
    }

    public function updateAppliedDocumentStatus(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, AppliedDocument $appliedDocument)
    {
        $this->getStatusValidation($request);
        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $appliedDocument) {
            $appliedDocument->update([
                'status' => $request->input('status')
            ]);
            $appliedDocument->appliedDocumentStatuses()->create([
                "applied_document_id" => $appliedDocument->id,
                "status" => $request->input('status'),
                "comment" => $request->input('comment'),
            ]);
            Notification::send($mapApply->organization, new StepNotification($mapApply, $form, $formDataType, $appliedDocument));
        });

        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
        return back();
    }

    public function updateFormStoreStatus(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, FormStore $formStore)
    {
        $this->getStatusValidation($request);
        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $formStore) {
            $formStore->update([
                'status' => $request->input('status')
            ]);
            $formStore->formStoreStatuses()->create([
                "form_store_id" => $formStore->id,
                "status" => $request->input('status'),
                "comment" => $request->input('comment'),
                "data" => $formStore->data,
                "fields" => $formStore->fields
            ]);
            Notification::send($mapApply->organization, new FormStoreNotification($mapApply, $form, $formDataType, $formStore));
        });

        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
        return back();
    }

    public function updatePaymentStoreStatus(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, PaymentStore $paymentStore)
    {
        $this->getStatusValidation($request);

        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $paymentStore) {
            $paymentStore->update([
                'status' => $request->input('status')
            ]);
            $paymentStore->paymentStoreStatuses()->create([
                "payment_store_id" => $paymentStore->id,
                "status" => $request->input('status'),
                "comment" => $request->input('comment'),
                "bill" => $paymentStore->bill,
                "amount" => $paymentStore->amount
            ]);
            Notification::send($mapApply->organization, new PaymentStoreNotification($mapApply, $form, $formDataType, $paymentStore));
        });
        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
        return back();
    }

    public function getStatusValidation($request)
    {
        return $request->validate([
            'status' => ['required', 'string', new Enum(DocumentStatusEnum::class)],
            'comment' => ['required_if:status,' . DocumentStatusEnum::REJECTED->value],
        ]);
    }
}
