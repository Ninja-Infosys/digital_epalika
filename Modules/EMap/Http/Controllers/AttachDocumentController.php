<?php

namespace Modules\EMap\Http\Controllers;

use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\FormStoreNotification;
use App\Notifications\PaymentStoreNotification;
use App\Notifications\StepNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Modules\EMap\Entities\AttachDocument;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Entities\FileTemplateStore;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Entities\PaymentStoreStatus;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\FormStoreStatus;
use Modules\EMap\Entities\AppliedDocumentStatus;
use Modules\EMap\Entities\FormDataType;
use Modules\EMap\Enums\FormTypeEnum;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;
use Modules\EMap\Traits\TemplateTrait;

class AttachDocumentController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;

    public function store(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType)
    {

        $form->load('group.users');
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);

            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $appliedDocument = $mapApply->appliedDocuments()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id
                ]);
                foreach ($data['documents'] as $file) {
                    $appliedDocument->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $file->store('appliedDocument', 'public'),
                    ]);
                }

                Notification::send($form->group->users, new StepNotification($mapApply, $form, $formDataType, $appliedDocument));
            });

            toast('फाईल सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);

            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $formStore = $mapApply->formStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id,
                    'data' => $data['data'],
                    'fields' => $form->fields ?? ''
                ]);
                Notification::send($form->group->users, new FormStoreNotification($mapApply, $form, $formDataType, $formStore));
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['required', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $paymentStore = $mapApply->paymentStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'bill' => $data['bill']->store('appliedDocument', 'public'),
                    'amount' => $data['amount'],
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id
                ]);
                Notification::send($form->group->users, new PaymentStoreNotification($mapApply, $form, $formDataType, $paymentStore));
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }
        return redirect(route('organization.admin.formDetail', [$mapApply, $form]));
    }


    public function documentDetail(AppliedDocument $appliedDocument)
    {
        $appliedDocument->load('appliedMapFiles', 'form');
        return view('emap::organization.attach-document.documentDetail', compact('appliedDocument'));
    }


    public function formStoreDetail(FormStore $formStore)
    {
        $formStore->load('formStoreStatuses');
        return view('emap::organization.attach-document.formStoreDetail', compact('formStore'));
    }

    public function printTemplate(MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        $data = $this->getPrintData($mapApply, $form, $formDataType);
        return response()->json([
            'view' => (string)View::make('emap::organization.attach-document.print', compact('data')),
        ]);
    }

    public function update(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, $id)
    {
        $form->load('group.users');
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);
            DB::transaction(function () use ($request, $mapApply, $formDataType, $form, $data, $id) {
                $appliedDocument = AppliedDocument::find($id);
                if ($appliedDocument->status == DocumentStatusEnum::PENDING) {
                    foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                        $existingFile->forceDelete();
                        foreach ($data['documents'] as $file) {
                            $appliedDocument->appliedMapFiles()->create([
                                "map_apply_id" => $mapApply->id,
                                "document" => $file->store('appliedDocument', 'public'),
                            ]);
                        }
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                } elseif ($appliedDocument->status == DocumentStatusEnum::REVIEW) {
                    toast('Document On Review You Cannot Change Document', 'error');
                } elseif ($appliedDocument->status == DocumentStatusEnum::APPROVED) {
                    toast('Document Is Already Approved', 'warning');
                } else {
                    $appliedDocument->update([
                        'status' => DocumentStatusEnum::PENDING->value
                    ]);
                    $appliedDocumentStatus = AppliedDocumentStatus::create([
                        "applied_document_id" => $appliedDocument->id,
                        "status" => DocumentStatusEnum::PENDING->value
                    ]);
                    foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                        $existingFile->forceDelete();
                    }
                    foreach ($data['documents'] as $file) {
                        $newAppliedDocuments = $appliedDocument->appliedMapFiles()->create([
                            "map_apply_id" => $mapApply->id,
                            "document" => $file->store('appliedDocument', 'public'),
                        ]);

                        $appliedDocumentStatus->appliedMapFiles()->create([
                            "map_apply_id" => $mapApply->id,
                            "document" => $newAppliedDocuments->document,
                        ]);
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                }

                Notification::send($form->group->users, new StepNotification($mapApply, $form, $formDataType, $appliedDocument));
            });
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $formDataType, $form, $data, $id) {
                $formStore = FormStore::find($id);
                if ($formStore->status == DocumentStatusEnum::PENDING) {
                    $formStore->update([
                        'data' => $data['data'],
                        'document' => null
                    ]);
                    if ($formStore->formStoreStatuses->count() > 0) {
                        FormStoreStatus::where('form_store_id', $formStore->id)
                            ->orderBy('id', 'desc')
                            ->first()?->update([
                                'document' => null
                            ]);
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                } elseif ($formStore->status == DocumentStatusEnum::REVIEW) {
                    toast('Form Data On Review You Cannot Change Data', 'error');
                } elseif ($formStore->status == DocumentStatusEnum::APPROVED) {
                    toast('Form Data Is Already Approved', 'warning');
                } else {
                    FormStoreStatus::create([
                        "form_store_id" => $formStore->id,
                        "status" => DocumentStatusEnum::PENDING->value,
                        "data" => $data['data'],
                        "fields" => $formStore->fields,
                    ]);

                    $formStore->update([
                        "status" => DocumentStatusEnum::PENDING->value,
                        'data' => $data['data'],
                        'document' => null
                    ]);
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                }
                Notification::send($form->group->users, new FormStoreNotification($mapApply, $form, $formDataType, $formStore));
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['nullable', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $formDataType, $form, $data, $id) {
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
                Notification::send($form->group->users, new PaymentStoreNotification($mapApply, $form, $formDataType, $paymentStore));
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }
        return redirect(route('organization.admin.formDetail', [$mapApply, $form]));
    }

    public function index(MapApply $mapApply)
    {
        $mapApply->load('attachDocument');
        return view('emap::organization.organizationDocument.index', compact('mapApply'));
    }

    public function storeOrganizationDocument(Request $request, MapApply $mapApply)
    {

        $attachdocument = AttachDocument::where('map_apply_id', $mapApply->id)->first() ?? null;
        if (!$attachdocument) {
            $data = $request->validate([
                'land_owner_document' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'land_revenue_document' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'land_owner_citizenship' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'blue_print' => ['required', 'mimes:png,jpg,jpeg,pdf'],
                'pass_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'designer_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'permission_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'inheritance_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'analysis_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
            ]);
        } else {
            $data = $request->validate([
                'land_owner_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'land_revenue_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'land_owner_citizenship' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'blue_print' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'pass_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'designer_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'permission_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'inheritance_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
                'analysis_document' => ['nullable', 'mimes:png,jpg,jpeg,pdf'],
            ]);
        }

        if ($request->hasFile('land_owner_document') && !empty($mapApply->attachDocument->land_owner_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('land_owner_document'));
        }

        if ($request->hasFile('land_revenue_document') && !empty($mapApply->attachDocument->land_revenue_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('land_revenue_document'));
        }

        if ($request->hasFile('land_owner_citizenship') && !empty($mapApply->attachDocument->land_owner_citizenship)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('land_owner_citizenship'));
        }

        if ($request->hasFile('blue_print') && !empty($mapApply->attachDocument->blue_print)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('blue_print'));
        }

        if ($request->hasFile('pass_document') && !empty($mapApply->attachDocument->pass_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('pass_document'));
        }

        if ($request->hasFile('designer_document') && !empty($mapApply->attachDocument->designer_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('designer_document'));
        }

        if ($request->hasFile('permission_document') && !empty($mapApply->attachDocument->permission_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('permission_document'));
        }

        if ($request->hasFile('inheritance_document') && !empty($mapApply->attachDocument->inheritance_document)) {
            $this->deleteFile($mapApply->attachDocument->getRawOriginal('inheritance_document'));
        }
        AttachDocument::updateOrCreate([
            'map_apply_id' => $mapApply->id
        ], $data);
        toast('File added successfully', 'success');
        return back();
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

    public function formStorePrint(FormDataType $formDataType, FormStore $formStore)
    {
        $formStore->load('form_data.model');
        $formDataType->load('model');
        $template = $formStore->form_data?->model?->template ?? '';

        foreach ($formStore->data as $key => $value) {
            $placeholder = '[@form.' . $key . ']';
            $template = str_replace($placeholder, $value, $template);
        }

        return view('emap::organization.attach-document.form-print', compact('template', 'formDataType', 'formStore'));
    }

    public function formStoreStatusPrint(FormDataType $formDataType, FormStore $formStore, FormStoreStatus $formStoreStatus)
    {
        $formStore->load('form_data.model');
        $formDataType->load('model');
        $template = $formStore->form_data?->model?->template ?? '';

        foreach ($formStoreStatus->data as $key => $value) {
            $placeholder = '[@form.' . $key . ']';
            $template = str_replace($placeholder, $value, $template);
        }

        return view('emap::organization.attach-document.form-print', compact('template', 'formDataType'));
    }

    public function editTemplate(MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        $data = $this->getPrintData($mapApply, $form, $formDataType);
        return view('emap::organization.template-edit.edit-file', compact('mapApply', 'data', 'formDataType', 'form'));
    }

    public function storeFileTemplate(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        $request->validate([
            'data' => ['required']
        ]);
        FileTemplateStore::updateOrCreate([
            'map_apply_id' => $mapApply->id,
            'form_id' => $form->id,
            'form_data_type_id' => $formDataType->id,
        ], ['data' => $request->input('data')]);
        toast('टेम्प्लेट विवरण सम्पादन सफलतापूर्वक गरियो', 'success');
        return redirect(route('organization.admin.formDetail', [$mapApply, $form])  );
    }

    /**
     * @param MapApply $mapApply
     * @param Form $form
     * @param FormDataType $formDataType
     * @return string
     */
    public function getPrintData(MapApply $mapApply, Form $form, FormDataType $formDataType): string
    {
        $fileTemplateStore = FileTemplateStore::where('map_apply_id', $mapApply->id)
            ->where('form_id', $form->id)
            ->where('form_data_type_id', $formDataType->id)
            ->first()?->data ?? null;

        $formDataType->load('model');
        $mapApply->load(
            'landDetail',
            'landOwner',
            'houseOwner',
            'fourForts',
            'storeyDetails',
            'applicantDetail.citizenshipIssueDistrict',
            'criteriaDetails',
            'buildingDetails',
            'designerDetails'
        );
        return $fileTemplateStore ?? Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply), $formDataType->model?->data);
    }
}
