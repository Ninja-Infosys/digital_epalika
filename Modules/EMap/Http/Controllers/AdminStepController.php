<?php

namespace Modules\EMap\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\FormStoreNotification;
use App\Notifications\PaymentStoreNotification;
use App\Notifications\StepNotification;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\AppliedDocumentStatus;
use Modules\EMap\Entities\FileTemplateStore;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\FormDataType;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\FormStoreStatus;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Entities\PaymentStoreStatus;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\FormTypeEnum;
use Modules\EMap\Traits\TemplateTrait;

class AdminStepController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;

    public function formList(MapApply $mapApply)
    {

        $mapApply->load('houseOwner');

        [$forms, $order] = $this->listForms($mapApply);

        return view('emap::admin.step.formList', compact('mapApply', 'forms', 'order'));
    }

    public function viewDetail(MapApply $mapApply, Form $form)
    {

        $mapApply->load('houseOwner');
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments.appliedDocumentStatuses', 'formDataTypes.formStores.formStoreStatuses', 'group');
        $checkUser = $form->group->users->pluck('id')->contains(auth()->user()->id);
        $MapGroups = DB::table('map_pass_group_user')->where('user_id', auth()->user()->id)->first() ?? null;
        $ward_no = $MapGroups ? explode(',', $MapGroups?->ward_no ?? '') : [];
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
        $lastStep = Form::orderBy('order', 'desc')->first()?->order ?? null;
        $firstId = Form::orderBy('order')->first()?->id ?? null;
        $this->getStatusValidation($request);
        DB::transaction(function () use ($firstId, $request, $mapApply, $form, $formDataType, $appliedDocument, $lastStep) {
            if ($lastStep == $form->order) {
                $appliedDocumentStatus = AppliedDocument::where('id', '!=', $appliedDocument->id)
                    ->where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $formStoreStatus = FormStore::where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $paymentStoreStatus = PaymentStore::where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');

                $this->paymentStoreUpdate($formStoreStatus, $paymentStoreStatus, $request, $appliedDocumentStatus, $mapApply);
            } else {
                if ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                    $mapApply->update([
                        'sent_to_organization' => 'processing',
                    ]);
                    if ($form->id == $firstId && empty($mapApply->registration_no)) {
                        $mapApply->update([
                            'registration_date' => now(),
                            'registration_no' => MapApply::whereFiscalYearId($mapApply->fiscal_year_id)->max('registration_no') + 1,
                        ]);
                    }
                }
            }

            if ($request->input('status') == DocumentStatusEnum::PENDING->value) {
                toast('Updated New Status', 'warning');
            } elseif ($request->input('status') == DocumentStatusEnum::REVIEW->value) {
                $appliedDocument->update([
                    'status' => $request->input('status'),
                ]);
                AppliedDocumentStatus::where('applied_document_id', $appliedDocument->id)
                    ->orderBy('id', 'desc')
                    ->first()?->update([
                        'status' => $request->input('status'),
                    ]);
                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            } elseif ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                if ($appliedDocument->status != DocumentStatusEnum::APPROVED) {
                    $appliedDocument->update([
                        'status' => $request->input('status'),
                    ]);
                    AppliedDocumentStatus::where('applied_document_id', $appliedDocument->id)
                        ->orderBy('id', 'desc')
                        ->first()?->update([
                            'status' => $request->input('status'),
                        ]);
                    toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
                }
            } else {
                $appliedDocument->update([
                    'status' => $request->input('status'),
                ]);
                $appliedDocumentStatusData = $appliedDocument->appliedDocumentStatuses()->create([
                    'applied_document_id' => $appliedDocument->id,
                    'status' => $request->input('status'),
                    'comment' => $request->input('comment'),
                ]);
                foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                    $appliedDocumentStatusData->appliedMapFiles()->create([
                        'map_apply_id' => $mapApply->id,
                        'document' => $existingFile->document,
                    ]);
                }
                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            }
            Notification::send($mapApply->organization, new StepNotification($mapApply, $form, $formDataType, $appliedDocument));
        });

        return back();
    }

    public function uploadApprovedDocument(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, AppliedDocument $appliedDocument)
    {
        $request->validate([
            'approved_document' => ['required'],
        ]);

        $appliedDocument->update([
            'approved_document' => $request->file('approved_document'),
        ]);
        if (! empty($mapApply->registration_no)) {
            toast('यो नक्सा पहिने नै दर्ता भएको छ', 'success');

            return back();
        }
        $mapApply->update([
            'registration_date' => now(),
            'registration_no' => MapApply::whereFiscalYearId($mapApply->fiscal_year_id)->max('registration_no') + 1,
        ]);

        toast('स्वीकार गरेको छाप अपलोड गरियो', 'success');

        return back();
    }

    public function updateFormStoreStatus(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, FormStore $formStore)
    {
        $this->getStatusValidation($request);
        $lastStep = Form::orderBy('order', 'desc')->first()?->order ?? null;
        $firstId = Form::orderBy('order')->first()?->id ?? null;
        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $formStore, $lastStep, $firstId) {

            if ($lastStep == $form->order) {
                $appliedDocumentStatus = AppliedDocument::where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $formStoreStatus = FormStore::where('id', '!=', $formStore->id)
                    ->where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $paymentStoreStatus = PaymentStore::where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $this->paymentStoreUpdate($appliedDocumentStatus, $paymentStoreStatus, $request, $formStoreStatus, $mapApply);
            } else {
                if ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                    $mapApply->update([
                        'sent_to_organization' => 'processing',
                    ]);

                    if ($form->id == $firstId && empty($mapApply->registration_no)) {
                        $mapApply->update([
                            'registration_date' => now(),
                            'registration_no' => MapApply::whereFiscalYearId($mapApply->fiscal_year_id)->max('registration_no') + 1,
                        ]);
                    }
                }
            }

            if ($request->input('status') == DocumentStatusEnum::PENDING->value) {
                toast('Updated New Status', 'warning');
            } elseif ($request->input('status') == DocumentStatusEnum::REVIEW->value) {
                $formStore->update([
                    'status' => $request->input('status'),
                ]);
                FormStoreStatus::where('form_store_id', $formStore->id)
                    ->orderBy('id', 'desc')
                    ->first()?->update([
                        'status' => $request->input('status'),
                    ]);
                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            } elseif ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                if ($formStore->status != DocumentStatusEnum::APPROVED) {
                    $formStore->update([
                        'status' => $request->input('status'),
                    ]);
                    FormStoreStatus::where('form_store_id', $formStore->id)
                        ->orderBy('id', 'desc')
                        ->first()?->update([
                            'status' => $request->input('status'),
                        ]);
                    toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
                }
            } else {
                $formStore->update([
                    'status' => $request->input('status'),
                ]);
                $formStore->formStoreStatuses()->create([
                    'form_store_id' => $formStore->id,
                    'status' => $request->input('status'),
                    'comment' => $request->input('comment'),
                    'data' => $formStore->data,
                    'fields' => $formStore->fields,
                    'document' => $formStore->document,
                ]);

                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            }
            Notification::send($mapApply->organization, new FormStoreNotification($mapApply, $form, $formDataType, $formStore));
        });

        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');

        return back();
    }

    public function uploadFormStoreApprovedDocument(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, FormStore $formStore)
    {
        $request->validate([
            'approved_document' => ['required'],
        ]);

        $formStore->update([
            'approved_document' => $request->file('approved_document'),
        ]);

        toast('स्वीकार गरेको छाप अपलोड गरियो', 'success');

        return back();
    }

    public function updatePaymentStoreStatus(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, PaymentStore $paymentStore)
    {
        $this->getStatusValidation($request);
        $lastStep = Form::orderBy('order', 'desc')->first()?->order ?? null;
        $firstId = Form::orderBy('order')->first()?->id ?? null;
        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $paymentStore, $lastStep, $firstId) {

            if ($lastStep == $form->order) {
                $appliedDocumentStatus = AppliedDocument::where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $formStoreStatus = FormStore::where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $paymentStoreStatus = PaymentStore::where('id', '!=', $paymentStore->id)
                    ->where('map_apply_id', $mapApply->id)
                    ->where('form_id', $form->id)
                    ->pluck('status');
                $this->paymentStoreUpdate($appliedDocumentStatus, $formStoreStatus, $request, $paymentStoreStatus, $mapApply);
            } else {
                if ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                    $mapApply->update([
                        'sent_to_organization' => 'processing',
                    ]);

                    if ($form->id == $firstId && empty($mapApply->registration_no)) {
                        $mapApply->update([
                            'registration_date' => now(),
                            'registration_no' => MapApply::whereFiscalYearId($mapApply->fiscal_year_id)->max('registration_no') + 1,
                        ]);
                    }
                }
            }

            $paymentStore->update([
                'status' => $request->input('status'),
            ]);
            $paymentStore->paymentStoreStatuses()->create([
                'payment_store_id' => $paymentStore->id,
                'status' => $request->input('status'),
                'comment' => $request->input('comment'),
                'bill' => $paymentStore->bill,
                'amount' => $paymentStore->amount,
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
            'comment' => ['required_if:status,'.DocumentStatusEnum::REJECTED->value],
        ]);
    }

    public function rejectMap(Request $request, MapApply $mapApply)
    {
        $request->validate([
            'comment' => ['required'],
        ]);
        $mapApply->update([
            'sent_to_organization' => 'rejected',
            'comment' => $request->input('comment'),

        ]);
        toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');

        return back();
    }

    public function formDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments.appliedDocumentStatuses', 'formDataTypes.formStores.formStoreStatuses', 'formDataTypes.paymentStores.paymentStoreStatuses');

        return view('emap::admin.step.formFileUpload', compact('mapApply', 'form'));
    }

    public function storeDocument(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        $form->load('group.users');
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file'],
            ]);

            DB::transaction(function () use ($mapApply, $form, $data, $formDataType) {
                $appliedDocument = $mapApply->appliedDocuments()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id,
                ]);
                foreach ($data['documents'] as $file) {
                    $appliedDocument->appliedMapFiles()->create([
                        'map_apply_id' => $mapApply->id,
                        'document' => $file->store('appliedDocument', 'public'),
                    ]);
                }
            });

            toast('फाईल सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);

            DB::transaction(function () use ($mapApply, $form, $data, $formDataType) {
                $formStore = $mapApply->formStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id,
                    'data' => $data['data'],
                    'fields' => $form->fields ?? '',
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['required', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($mapApply, $form, $data, $formDataType) {
                $paymentStore = $mapApply->paymentStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'bill' => $data['bill']->store('appliedDocument', 'public'),
                    'amount' => $data['amount'],
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id,
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }

        return redirect(route('emap.admin.mapApply.admin-step.formDetail', [$mapApply, $form]));
    }

    public function updateDocument(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, $id)
    {
        $form->load('group.users');
        if ($formDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file'],
            ]);
            DB::transaction(function () use ($mapApply, $data, $id) {
                $appliedDocument = AppliedDocument::find($id);
                if ($appliedDocument->status == DocumentStatusEnum::PENDING) {
                    foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                        $existingFile->forceDelete();
                        foreach ($data['documents'] as $file) {
                            $appliedDocument->appliedMapFiles()->create([
                                'map_apply_id' => $mapApply->id,
                                'document' => $file->store('appliedDocument', 'public'),
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
                        'status' => DocumentStatusEnum::PENDING->value,
                    ]);
                    $appliedDocumentStatus = AppliedDocumentStatus::create([
                        'applied_document_id' => $appliedDocument->id,
                        'status' => DocumentStatusEnum::PENDING->value,
                    ]);
                    foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                        $existingFile->forceDelete();
                    }
                    foreach ($data['documents'] as $file) {
                        $newAppliedDocuments = $appliedDocument->appliedMapFiles()->create([
                            'map_apply_id' => $mapApply->id,
                            'document' => $file->store('appliedDocument', 'public'),
                        ]);

                        $appliedDocumentStatus->appliedMapFiles()->create([
                            'map_apply_id' => $mapApply->id,
                            'document' => $newAppliedDocuments->document,
                        ]);
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                }
            });
        } elseif ($formDataType->type == FormTypeEnum::FORM) {
            $data = $request->validate([
                'data' => ['required'],
            ]);
            DB::transaction(function () use ($data, $id) {
                $formStore = FormStore::find($id);
                if ($formStore->status == DocumentStatusEnum::PENDING) {
                    $formStore->update([
                        'data' => $data['data'],
                        'document' => null,
                    ]);
                    if ($formStore->formStoreStatuses->count() > 0) {
                        FormStoreStatus::where('form_store_id', $formStore->id)
                            ->orderBy('id', 'desc')
                            ->first()?->update([
                                'document' => null,
                            ]);
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                } elseif ($formStore->status == DocumentStatusEnum::REVIEW) {
                    toast('Form Data On Review You Cannot Change Data', 'error');
                } elseif ($formStore->status == DocumentStatusEnum::APPROVED) {
                    toast('Form Data Is Already Approved', 'warning');
                } else {
                    FormStoreStatus::create([
                        'form_store_id' => $formStore->id,
                        'status' => DocumentStatusEnum::PENDING->value,
                        'data' => $data['data'],
                        'fields' => $formStore->fields,
                    ]);

                    $formStore->update([
                        'status' => DocumentStatusEnum::PENDING->value,
                        'data' => $data['data'],
                        'document' => null,
                    ]);
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                }
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        } elseif ($formDataType->type == FormTypeEnum::PAYMENT) {
            $data = $request->validate([
                'bill' => ['nullable', 'file'],
                'amount' => ['required', 'numeric'],
            ]);
            DB::transaction(function () use ($data, $id) {
                $paymentStore = PaymentStore::find($id);
                PaymentStoreStatus::create([
                    'payment_store_id' => $paymentStore->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'bill' => $paymentStore->bill,
                    'amount' => $paymentStore->amount,
                ]);
                $paymentStore->update([
                    'bill' => (array_key_exists('bill', $data) && ! empty($data['bill'])) ? $data['bill']->store('appliedDocument', 'public') : $paymentStore->bill,
                    'amount' => $data['amount'],
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }

        return redirect(route('emap.admin.mapApply.admin-step.formDetail', [$mapApply, $form]));
    }

    public function printTemplate(MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        $data = $this->getPrintData($mapApply, $form, $formDataType);

        return response()->json([
            'view' => (string) View::make('emap::organization.attach-document.print', compact('data')),
        ]);
    }

    public function editTemplate(MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        $data = $this->getPrintData($mapApply, $form, $formDataType);

        return view('emap::admin.template-edit.edit-file', compact('mapApply', 'data', 'formDataType', 'form'));
    }

    public function storeFileTemplate(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        $request->validate([
            'data' => ['required'],
        ]);
        FileTemplateStore::updateOrCreate([
            'map_apply_id' => $mapApply->id,
            'form_id' => $form->id,
            'form_data_type_id' => $formDataType->id,
        ], ['data' => $request->input('data')]);
        toast('टेम्प्लेट विवरण सम्पादन सफलतापूर्वक गरियो', 'success');

        return redirect(route('emap.admin.mapApply.admin-step.formDetail', [$mapApply, $form]));
    }

    public function formStorePrint(FormDataType $formDataType, FormStore $formStore)
    {
        $formStore->load('form_data.model');
        $formDataType->load('model');
        $mapApply = MapApply::where('id', $formStore->map_apply_id)->first() ?? '';
        $template = $formStore->form_data?->model?->template ?? '';

        foreach ($formStore->data as $key => $value) {
            $placeholder = '[@form.'.$key.']';
            $data = Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply), $template);
            $template = str_replace($placeholder, $value, $data);
        }

        return view('emap::admin.step.form-print', compact('template', 'formDataType', 'formStore'));
    }

    public function uploadDocument(Request $request, FormStore $formStore)
    {
        $data = $request->validate([
            'document' => ['required', 'file'],
        ]);

        DB::transaction(function () use ($data, $formStore) {
            $formStore->update($data);
            $existingFormStore = FormStore::find($formStore->id);
            FormStoreStatus::where('form_store_id', $formStore->id)
                ->orderBy('id', 'desc')
                ->where('status', DocumentStatusEnum::PENDING->value)
                ->first()?->update([
                    'document' => $existingFormStore->document,
                ]);
        });
        toast('File Upload Successfully', 'success');

        return back();
    }

    public function viewDocumentDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments', 'formDataTypes.formStores');

        return view('emap::admin.step.documentDetail', compact('mapApply', 'form'));
    }

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
            'designerDetails',

        );

        return $fileTemplateStore ?? Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply), $formDataType->model?->data);
    }

    public function paymentStoreUpdate(\Illuminate\Support\Collection $appliedDocumentStatus, \Illuminate\Support\Collection $formStoreStatus, Request $request, \Illuminate\Support\Collection $paymentStoreStatus, MapApply $mapApply): void
    {
        if (
            $appliedDocumentStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
            $formStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
            $request->input('status') == DocumentStatusEnum::APPROVED->value
        ) {
            if ($paymentStoreStatus->isEmpty()) {
                $mapApply->update([
                    'sent_to_organization' => 'done',
                ]);
            } else {
                if ($paymentStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value)) {
                    $mapApply->update([
                        'sent_to_organization' => 'done',
                    ]);
                }
            }
        }
    }
}
