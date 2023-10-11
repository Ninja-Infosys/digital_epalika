<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Enums\DocumentStatusEnum;

class AdminStepController extends Controller
{
    public function formList(MapApply $mapApply)
    {
        $forms = Form::with('formDataTypes')->orderBy('order')->get();
        return view('emap::admin.step.formList', compact('mapApply', 'forms'));
    }

    public function viewDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments', 'formDataTypes.formStores');
        return view('emap::admin.step.formDetail', compact('mapApply', 'form'));
    }

    public function fillDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments', 'formDataTypes.formStores');
        return view('emap::admin.step.formFill', compact('mapApply', 'form'));
    }

    public function updateAppliedDocumentStatus(Request $request, AppliedDocument $appliedDocument)
    {
        $this->getStatusValidation($request);
        DB::transaction(function () use ($request, $appliedDocument) {
            $appliedDocument->update([
                'status' => $request->input('status')
            ]);
            $appliedDocument->appliedDocumentStatuses()->create([
                "applied_document_id" => $appliedDocument->id,
                "status" => $request->input('status'),
                "comment" => $request->input('comment'),
            ]);
        });

        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
        return back();
    }

    public function updateFormStoreStatus(Request $request, FormStore $formStore)
    {
        $this->getStatusValidation($request);
        DB::transaction(function () use ($request, $formStore) {
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
        });

        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
        return back();
    }

    public function updatePaymentStoreStatus(Request $request, PaymentStore $paymentStore)
    {
        $this->getStatusValidation($request);

        DB::transaction(function () use ($request, $paymentStore) {
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
