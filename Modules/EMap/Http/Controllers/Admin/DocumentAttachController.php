<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Entities\PaymentStoreStatus;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\FormStoreStatus;
use Modules\EMap\Entities\AppliedDocumentStatus;
use Modules\EMap\Entities\FormDataType;
use Modules\EMap\Enums\FormTypeEnum;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;
use Modules\EMap\Traits\TemplateTrait;

class DocumentAttachController extends Controller
{
    use TemplateTrait;

    public function store(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);

            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $appliedDocument = $mapApply->appliedDocuments()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::APPROVED->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id
                ]);
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

            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $mapApply->formStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::APPROVED->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id,
                    'data' => $data['data'],
                    'fields' => $form->fields ?? ''
                ]);
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
                    'status' => DocumentStatusEnum::APPROVED->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'bill' => $data['bill']->store('appliedDocument', 'public'),
                    'amount' => $data['amount'],
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }

        return redirect(route('emap.admin.mapApply.admin-step.fill-detail', [$mapApply, $form]));
    }


    public function formStoreDetail(FormStore $formStore)
    {
        $formStore->load('formStoreStatuses');
        toast('', 'success');
        return back()->with(compact('formStore'));
    }

    public function printTemplate(MapApply $mapApply, Form $form, FormDataType $formDataType)
    {

        $formDataType->load('model');
        $mapApply->load(
            'landDetail',
            'landOwner',
            'houseOwner',
            'fourForts',
            'applicantDetail.citizenshipIssueDistrict',
            'criteriaDetails',
            'buildingDetails',
            'designerDetails'
        );
        $data = Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply), $formDataType->model->data);

        return response()->json([
            'view' => (string)View::make('emap::organization.attach-document.print', compact('data')),
        ]);
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
                    "status" => $appliedDocument->value
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
                    "status" => $formStore->value,
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
                    "status" => $paymentStore->value,
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
        return redirect(route('emap.admin.mapApply.admin-step.fill-detail', [$mapApply, $form]));
    }
}
