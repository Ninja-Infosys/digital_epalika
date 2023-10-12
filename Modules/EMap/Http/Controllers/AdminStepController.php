<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $appliedDocument->update([
            'status' => $request->input('status')
        ]);

        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
        return back();
    }

    public function updateFormStoreStatus(Request $request, FormStore $formStore)
    {
        $this->getStatusValidation($request);
        $formStore->update([
            'status' => $request->input('status')
        ]);

        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
        return back();
    }

    public function updatePaymentStoreStatus(Request $request, PaymentStore $paymentStore)
    {
        $this->getStatusValidation($request);
        $paymentStore->update([
            'status' => $request->input('status')
        ]);

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
