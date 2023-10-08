<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\AttachDocument;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Entities\PaymentStoreStatus;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\EMapFormFillerTypeEnum;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\FormStoreStatus;
use Modules\EMap\Entities\AppliedDocumentStatus;
use Modules\EMap\Entities\AppliedMapFile;
use Modules\EMap\Entities\FormDataType;
use Modules\EMap\Enums\FormTypeEnum;

class AttachDocumentController extends Controller
{
    public function store(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data) {
                $appliedDocument = $mapApply->appliedDocuments()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id
                ]);
                /*AppliedDocumentStatus::create([
                    "applied_document_id" => $appliedDocument->id,
                    "status" => DocumentStatusEnum::PENDING->value
                ]);*/
                foreach ($data['documents'] as $file) {
                    $appliedDocument->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $file->store('appliedDocument', 'public'),
                    ]);
                }
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data) {
                $mapApply->formStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'data' => $data['data'],
                    'fields' => $form->fields ?? ''
                ]);
//
//                FormStoreStatus::create([
//                    "form_store_id" => $formStore->id,
//                    "status" => DocumentStatusEnum::PENDING->value,
//                    "data" => json_encode($data['data']),
//                    "fields" => json_encode($data['data'])
//                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['required', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data) {
                $mapApply->paymentStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'bill' => $data['bill']->store('appliedDocument', 'public'),
                    'amount' => $data['amount'],
                ]);
//
//                FormStoreStatus::create([
//                    "form_store_id" => $formStore->id,
//                    "status" => DocumentStatusEnum::PENDING->value,
//                    "data" => json_encode($data['data']),
//                    "fields" => json_encode($data['data'])
//                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }
        return redirect(route('organization.admin.formDetail', [$mapApply, $form]));
    }

    public function update(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, $id)
    {
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data, $id) {
                $appliedDocument = AppliedDocument::find($id);
                $appliedDocumentStatus = AppliedDocumentStatus::create([
                    "applied_document_id" => $appliedDocument->id,
                    "status" => DocumentStatusEnum::PENDING->value
                ]);

                foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                    $appliedDocumentStatus->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $existingFile->document,
                    ]);
                    $existingFile->forceDelete();
                }
                foreach ($data['documents'] as $file) {
                    $appliedDocument->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $file->store('appliedDocument', 'public'),
                    ]);
                }
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data, $id) {
                $formStore = FormStore::find($id);
                FormStoreStatus::create([
                    "form_store_id" => $formStore->id,
                    "status" => DocumentStatusEnum::PENDING->value,
                    "data" => $formStore->data,
                    "fields" => $formStore->fields
                ]);
                $formStore->update([
                    'data' => $data['data'],
                ]);


            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['nullable', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data, $id) {
                $paymentStore = PaymentStore::find($id);
                PaymentStoreStatus::create([
                    "payment_store_id" => $paymentStore->id,
                    "status" => DocumentStatusEnum::PENDING->value,
                    'bill' => $paymentStore->bill,
                    'amount' => $paymentStore->amount,
                ]);
                $paymentStore->update([
                    'bill' => (array_key_exists('bill', $data) && !empty($data['bill'])) ? $data['bill']->store('appliedDocument', 'public') : $paymentStore->bill,
                    'amount' => $data['amount'],
                ]);


            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }
        return redirect(route('organization.admin.formDetail', [$mapApply, $form]));
    }
}
