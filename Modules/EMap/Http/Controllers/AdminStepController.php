<?php

namespace Modules\EMap\Http\Controllers;

use App\Models\User;
use App\Traits\NepaliDateConverter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\FormStoreNotification;
use App\Notifications\PaymentStoreNotification;
use App\Notifications\StepNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\AppliedDocumentStatus;
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
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\PostsEnum;

class AdminStepController extends Controller
{
    use NepaliDateConverter;
    public function formList(MapApply $mapApply)
    {

        $mapApply->load('houseOwner');

        $documentTypeModels = collect([AppliedDocument::class,FormStore::class,PaymentStore::class]);

        $documents = collect([]);

        foreach($documentTypeModels as $documentModel) {
            $typeDocuments = $documentModel::select('id', 'status', 'form_id')->where('map_apply_id', $mapApply->id)->get();
            foreach($typeDocuments as $document) {
                $documents->push([
                    'document_type' => class_basename($documentModel),
                    'form_id' => $document->form_id,
                    'status' => $document->status?->value
                ]);
            }

        }

        $order = 0;
        $allApproved = true;
        $forms = Form::withCount('formDataTypes')
            ->orderBy('order')
            ->get()->map(function ($form, $key) use ($documents, &$order, &$allApproved) {
                $status = $documents->where('form_id', $form->id)->pluck('status');

                if($allApproved && $status->count() == $form->form_data_types_count && $status->every(fn ($s) => $s == DocumentStatusEnum::APPROVED->value)) {
                    $order = $form->order + 1;
                } elseif($key == 0) {
                    $order = $form->order;
                    $allApproved = false;

                } else {
                    $allApproved = false;
                }
                if($allApproved) {
                    $mapStatus = DocumentStatusEnum::APPROVED;
                } elseif ($status->contains(DocumentStatusEnum::REJECTED->value)) {
                    $mapStatus = DocumentStatusEnum::REJECTED;
                } elseif ($status->count() > 0) {
                    $mapStatus = DocumentStatusEnum::PENDING;
                } else {
                    $mapStatus = DocumentStatusEnum::NOT_APPLIED;
                }
                $form->map_status = $mapStatus;
                return $form;
            });

        return view('emap::admin.step.formList', compact('mapApply', 'forms', 'order'));
    }

    public function viewDetail(MapApply $mapApply, Form $form)
    {

        $mapApply->load('houseOwner');
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments.appliedDocumentStatuses', 'formDataTypes.formStores.formStoreStatuses', 'group');
        $checkUser =  $form->group->users->pluck('id')->contains(auth()->user()->id);
        $MapGroups = DB::table('map_pass_group_user')->where('user_id', auth()->user()->id)->first() ?? null;
        $ward_no =  $MapGroups ? explode(',', $MapGroups?->ward_no ?? '') : [];
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
        $this->getStatusValidation($request);
        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $appliedDocument, $lastStep) {
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

                if (
                    $formStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
                    $paymentStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
                    $request->input('status') == DocumentStatusEnum::APPROVED->value
                ) {
                    if ($appliedDocumentStatus->isEmpty()) {
                        $mapApply->update([
                            'sent_to_organization' => 'done'
                        ]);
                    } else {
                        if ($appliedDocumentStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value)) {
                            $mapApply->update([
                                'sent_to_organization' => 'done'
                            ]);
                        }
                    }
                }
            } else {
                if ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                    $mapApply->update([
                        'sent_to_organization' => 'processing'
                    ]);
                }
            }

            if ($request->input('status') == DocumentStatusEnum::PENDING->value) {
                toast('Updated New Status', 'warning');
            } elseif ($request->input('status') == DocumentStatusEnum::REVIEW->value) {
                $appliedDocument->update([
                    'status' => $request->input('status')
                ]);
                AppliedDocumentStatus::where('applied_document_id', $appliedDocument->id)
                    ->orderBy('id', 'desc')
                    ->first()?->update([
                        'status' => $request->input('status')
                    ]);
                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            } elseif ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                if ($appliedDocument->status != DocumentStatusEnum::APPROVED) {
                    $appliedDocument->update([
                        'status' => $request->input('status')
                    ]);
                    AppliedDocumentStatus::where('applied_document_id', $appliedDocument->id)
                        ->orderBy('id', 'desc')
                        ->first()?->update([
                            'status' => $request->input('status')
                        ]);
                    toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
                }
            } else {
                $appliedDocument->update([
                    'status' => $request->input('status')
                ]);
                $appliedDocumentStatusData = $appliedDocument->appliedDocumentStatuses()->create([
                    "applied_document_id" => $appliedDocument->id,
                    "status" => $request->input('status'),
                    "comment" => $request->input('comment'),
                ]);
                foreach ($appliedDocument->appliedMapFiles as $existingFile) {
                    $appliedDocumentStatusData->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $existingFile->document,
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
            'approved_document' => ['required']
        ]);

        $appliedDocument->update([
            'approved_document' => $request->file('approved_document')
        ]);

        toast('स्वीकार गरेको छाप अपलोड गरियो', 'success');

        return back();
    }

    public function updateFormStoreStatus(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, FormStore $formStore)
    {
        $this->getStatusValidation($request);
        $lastStep = Form::orderBy('order', 'desc')->first()?->order ?? null;
        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $formStore, $lastStep) {

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
                if (
                    $appliedDocumentStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
                    $paymentStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
                    $request->input('status') == DocumentStatusEnum::APPROVED->value
                ) {
                    if ($formStoreStatus->isEmpty()) {
                        $mapApply->update([
                            'sent_to_organization' => 'done'
                        ]);
                    } else {
                        if ($formStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value)) {
                            $mapApply->update([
                                'sent_to_organization' => 'done'
                            ]);
                        }
                    }
                }
            } else {
                if ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                    $mapApply->update([
                        'sent_to_organization' => 'processing'
                    ]);
                }
            }

            if ($request->input('status') == DocumentStatusEnum::PENDING->value) {
                toast('Updated New Status', 'warning');
            } elseif ($request->input('status') == DocumentStatusEnum::REVIEW->value) {
                $formStore->update([
                    'status' => $request->input('status')
                ]);
                FormStoreStatus::where('form_store_id', $formStore->id)
                    ->orderBy('id', 'desc')
                    ->first()?->update([
                        'status' => $request->input('status')
                    ]);
                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            } elseif ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                if ($formStore->status != DocumentStatusEnum::APPROVED) {
                    $formStore->update([
                        'status' => $request->input('status')
                    ]);
                    FormStoreStatus::where('form_store_id', $formStore->id)
                        ->orderBy('id', 'desc')
                        ->first()?->update([
                            'status' => $request->input('status')
                        ]);
                    toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
                }
            } else {
                $formStore->update([
                    'status' => $request->input('status')
                ]);
                $formStore->formStoreStatuses()->create([
                   "form_store_id" => $formStore->id,
                   "status" => $request->input('status'),
                   "comment" => $request->input('comment'),
                   "data" => $formStore->data,
                   "fields" => $formStore->fields,
                    "document" => $formStore->document
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
            'approved_document' => ['required']
        ]);

        $formStore->update([
            'approved_document' => $request->file('approved_document')
        ]);

        toast('स्वीकार गरेको छाप अपलोड गरियो', 'success');

        return back();
    }

    public function updatePaymentStoreStatus(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType, PaymentStore $paymentStore)
    {
        $this->getStatusValidation($request);
        $lastStep = Form::orderBy('order', 'desc')->first()?->order ?? null;
        DB::transaction(function () use ($request, $mapApply, $form, $formDataType, $paymentStore, $lastStep) {

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
                if (
                    $appliedDocumentStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
                    $formStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value) &&
                    $request->input('status') == DocumentStatusEnum::APPROVED->value
                ) {
                    if ($paymentStoreStatus->isEmpty()) {
                        $mapApply->update([
                            'sent_to_organization' => 'done'
                        ]);
                    } else {
                        if ($paymentStoreStatus->every(fn ($status) => $status->value == DocumentStatusEnum::APPROVED->value)) {
                            $mapApply->update([
                                'sent_to_organization' => 'done'
                            ]);
                        }
                    }
                }
            } else {
                if ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                    $mapApply->update([
                        'sent_to_organization' => 'processing'
                    ]);
                }
            }

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

    public function rejectMap(Request $request, MapApply $mapApply)
    {
        $request->validate([
            'comment' => ['required'],
        ]);
        $mapApply->update([
            'sent_to_organization' => 'rejected',
            'comment' => $request->input('comment')

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
                'documents.*' => ['file']
            ]);

            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $appliedDocument = $mapApply->appliedDocuments()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
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
                $formStore =   $mapApply->formStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
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
            DB::transaction(function () use ($request, $mapApply, $form, $data, $formDataType) {
                $paymentStore =  $mapApply->paymentStores()->create([
                    'form_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'bill' => $data['bill']->store('appliedDocument', 'public'),
                    'amount' => $data['amount'],
                    'form_data_type' => FormDataType::class,
                    'form_data_id' => $formDataType->id
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
                    if($formStore->formStoreStatuses->count() > 0) {
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
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
        }
        return redirect(route('emap.admin.mapApply.admin-step.formDetail', [$mapApply, $form]));
    }

    public function printTemplate(MapApply $mapApply, FormDataType $formDataType)
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

    protected function getEmapTemplateData($mapApply)
    {
        $designerDetail = $mapApply->designerDetails->where('post', PostsEnum::DESIGNER)->first();
        $supervisorDetail = $mapApply->designerDetails->where('post', PostsEnum::SUPERVISOR)->first();
        $contractorDetail = $mapApply->designerDetails->where('post', PostsEnum::CONTRACTOR)->first();

        return [

            //header
            letterHead(),
            letterHeadEn(),
            get_nepali_number($this->get_today_nepali_date()),

            //mapApply
            get_nepali_number($mapApply->registration_no) ?? '',
            get_nepali_number($mapApply->registration_date) ?? '',
            get_nepali_number($mapApply->construction_type?->label()) ?? '',
            get_nepali_number($mapApply->usage?->label()) ?? '',
            get_nepali_number($mapApply->building_category?->label()) ?? '',
            get_nepali_number($mapApply->structureType->title) ?? '',
            get_nepali_number($mapApply->current_storey) ?? '',
            get_nepali_number($mapApply->future_storey) ?? '',
            get_nepali_number($mapApply->area_of_plinth) ?? '',
            get_nepali_number($mapApply->length) ?? '',
            get_nepali_number($mapApply->breadth) ?? '',
            get_nepali_number($mapApply->height) ?? '',
            //landDetail
            get_nepali_number($mapApply->landDetail?->landUseArea?->title) ?? '',
            get_nepali_number($mapApply->landDetail->ward_no) ?? '',
            get_nepali_number($mapApply->landDetail->former_ward_no) ?? '',
            get_nepali_number($mapApply->landDetail->tole) ?? '',
            get_nepali_number($mapApply->landDetail->street_code_no) ?? '',
            get_nepali_number($mapApply->landDetail->plot_no) ?? '',
            get_nepali_number($mapApply->landDetail->unit_value) ?? '',
            get_nepali_number($mapApply->landDetail->percentage_of_area_covered_by_building) ?? '',

            //landowner

            get_nepali_number($mapApply->landOwner->land_owner_type?->label()) ?? '',
            get_nepali_number($mapApply->landOwner->name) ?? '',
            get_nepali_number($mapApply->landOwner->phone) ?? '',
            get_nepali_number($mapApply->landOwner->father_name) ?? '',
            get_nepali_number($mapApply->landOwner->grandfather_name) ?? '',
            get_nepali_number($mapApply->landOwner->citizenshipIssueDistrict->district) ?? '',
            get_nepali_number($mapApply->landOwner->citizenship_no) ?? '',
            get_nepali_number($mapApply->landOwner->citizenship_issue_date) ?? '',
            get_nepali_number($mapApply->landOwner->address) ?? '',
            get_nepali_number($mapApply->landOwner->local_body) ?? '',
            get_nepali_number($mapApply->landOwner->ward_no) ?? '',

            //houseOwner

            get_nepali_number($mapApply->houseOwner->name) ?? '',
            get_nepali_number($mapApply->houseOwner->phone) ?? '',
            get_nepali_number($mapApply->houseOwner->father_name) ?? '',
            get_nepali_number($mapApply->houseOwner->grandfather_name) ?? '',
            get_nepali_number($mapApply->houseOwner->citizenshipIssueDistrict->district) ?? '',
            get_nepali_number($mapApply->houseOwner->citizenship_no) ?? '',
            get_nepali_number($mapApply->houseOwner->citizenship_issue_date) ?? '',
            get_nepali_number($mapApply->houseOwner->address) ?? '',
            get_nepali_number($mapApply->houseOwner->local_body) ?? '',
            get_nepali_number($mapApply->houseOwner->ward_no) ?? '',

            //FourForts
            (string)View::make('emap::inc.four_forts_table', [
                'fourForts' => $mapApply->fourForts,
            ]),
            (string)View::make('emap::inc.NameOfTheFortsAndSanghiars', [
                'actualSetBack' => $mapApply->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $mapApply->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),

            //applicantDetail
            get_nepali_number($mapApply->applicantDetail->applicant_type?->label()) ?? '',
            get_nepali_number($mapApply->applicantDetail->relation_with_owner?->label()) ?? '',
            get_nepali_number($mapApply->applicantDetail->name) ?? '',
            get_nepali_number($mapApply->applicantDetail->phone) ?? '',
            get_nepali_number($mapApply->applicantDetail->father_name) ?? '',
            get_nepali_number($mapApply->applicantDetail->citizenshipIssueDistrict->district) ?? '',
            get_nepali_number($mapApply->applicantDetail->citizenship_no) ?? '',
            get_nepali_number($mapApply->applicantDetail->citizenship_issue_date) ?? '',
            get_nepali_number($mapApply->applicantDetail->signature_url) ?? '',

            //criteria detail

            (string)View::make('emap::inc.criteria_details', [
                'criteriaDetails' => $mapApply->criteriaDetails,
            ]),
            //BuildingDetails

            (string)View::make('emap::inc.building_details', [
                'buildingDetails' => $mapApply->buildingDetails,
            ]),

            //DesignerDetails

            get_nepali_number($designerDetail->name) ?? '',
            get_nepali_number($designerDetail->father_name) ?? '',
            get_nepali_number($designerDetail->phone) ?? '',
            get_nepali_number($designerDetail->address) ?? '',
            get_nepali_number($designerDetail->local_body) ?? '',
            get_nepali_number($designerDetail->ward_no) ?? '',
            get_nepali_number($designerDetail->nec_council_no) ?? '',
            get_nepali_number($designerDetail->local_body_registration_no) ?? '',
            get_nepali_number($designerDetail->consulting_firm_name) ?? '',

            //supervisorDetails

            get_nepali_number($supervisorDetail->name) ?? '',
            get_nepali_number($supervisorDetail->father_name) ?? '',
            get_nepali_number($supervisorDetail->phone) ?? '',
            get_nepali_number($supervisorDetail->address) ?? '',
            get_nepali_number($supervisorDetail->local_body) ?? '',
            get_nepali_number($supervisorDetail->ward_no) ?? '',
            get_nepali_number($supervisorDetail->nec_council_no) ?? '',
            get_nepali_number($supervisorDetail->local_body_registration_no) ?? '',
            get_nepali_number($supervisorDetail->consulting_firm_name) ?? '',

            //ContractorDetails

            get_nepali_number($contractorDetail->name) ?? '',
            get_nepali_number($contractorDetail->father_name) ?? '',
            get_nepali_number($contractorDetail->phone) ?? '',
            get_nepali_number($contractorDetail->address) ?? '',
            get_nepali_number($contractorDetail->local_body) ?? '',
            get_nepali_number($contractorDetail->ward_no) ?? '',
            get_nepali_number($contractorDetail->nec_council_no) ?? '',
            get_nepali_number($contractorDetail->local_body_registration_no) ?? '',
            get_nepali_number($contractorDetail->consulting_firm_name) ?? '',
        ];
    }

    private function getReplaceData()
    {
        return [
            //header

            '[@letterHead]',
            '[@letterHeadEn]',
            '[@today_date]',
            //mapApply

            '[@registration_no]',
            '[@registration_date]',
            '[@construction_type]',
            '[@usage]',
            '[@building_category]',
            '[@structureType]',
            '[@current_storey]',
            '[@future_storey]',
            '[@area_of_plinth]',
            '[@length]',
            '[@breadth]',
            '[@height]',
            //landDetail
            '[@landDetail.land_use_area.title]',
            '[@landDetail.ward_no]',
            '[@landDetail.former_ward_no]',
            '[@landDetail.tole]',
            '[@landDetail.street_code_no]',
            '[@landDetail.plot_no]',
            '[@landDetail.area]',
            '[@landDetail.percentage_of_area_covered_by_building]',

            //landOwner
            '[@landOwner.land_owner_type]',
            '[@landOwner.name]',
            '[@landOwner.phone]',
            '[@landOwner.father_name]',
            '[@landOwner.grandfather_name]',
            '[@landOwner.citizenship_issue_district]',
            '[@landOwner.citizenship_no]',
            '[@landOwner.citizenship_issue_date]',
            '[@landOwner.address]',
            '[@landOwner.local_body]',
            '[@landOwner.ward_no]',

            //houseOwner

            '[@houseOwner.name]',
            '[@houseOwner.phone]',
            '[@houseOwner.father_name]',
            '[@houseOwner.grandfather_name]',
            '[@houseOwner.citizenship_issue_district]',
            '[@houseOwner.citizenship_no]',
            '[@houseOwner.citizenship_issue_date]',
            '[@houseOwner.address]',
            '[@houseOwner.local_body]',
            '[@houseOwner.ward_no]',

            //FourForts

            '[@fourForts]',
            '[@nameOfTheFortsAndSanghiars]',

            //applicantDetail

            '[@applicantDetail.applicant_type]',
            '[@applicantDetail.relation_with_owner]',
            '[@applicantDetail.name]',
            '[@applicantDetail.phone]',
            '[@applicantDetail.father_name]',
            '[@applicantDetail.citizenship_issue_district]',
            '[@applicantDetail.citizenship_no]',
            '[@applicantDetail.citizenship_issue_date]',
            '[@applicantDetail.signature_url]',

            //criteria detail
            '[@criteriaDetails]',

            //BuildingDetails
            '[@buildingDetails]',

            //DesignerDetails
            '[@designerDetail.name]',
            '[@designerDetail.father_name]',
            '[@designerDetail.phone]',
            '[@designerDetail.address]',
            '[@designerDetail.local_body]',
            '[@designerDetail.ward_no]',
            '[@designerDetail.nec_council_no]',
            '[@designerDetail.local_body_registration_no]',
            '[@designerDetail.consulting_firm_name]',

            //supervisorDetails

            '[@supervisorDetail.name]',
            '[@supervisorDetail.father_name]',
            '[@supervisorDetail.phone]',
            '[@supervisorDetail.address]',
            '[@supervisorDetail.local_body]',
            '[@supervisorDetail.ward_no]',
            '[@supervisorDetail.nec_council_no]',
            '[@supervisorDetail.local_body_registration_no]',
            '[@supervisorDetail.consulting_firm_name]',

            //ContractorDetails

            '[@contractorDetail.name]',
            '[@contractorDetail.father_name]',
            '[@contractorDetail.phone]',
            '[@contractorDetail.address]',
            '[@contractorDetail.local_body]',
            '[@contractorDetail.ward_no]',
            '[@contractorDetail.nec_council_no]',
            '[@contractorDetail.local_body_registration_no]',
            '[@contractorDetail.consulting_firm_name]'
        ];
    }

    public function formStorePrint(FormDataType $formDataType, FormStore $formStore)
    {
        $formStore->load('form_data.model');
        $formDataType->load('model');
        $mapApply = MapApply::where('id', $formStore->map_apply_id)->first() ?? '';
        $template = $formStore->form_data?->model?->template ?? '';

        foreach ($formStore->data as $key => $value) {
            $placeholder = '[@form.' . $key . ']';
            $data = Str::replace($this->getReplaceData(), $this->getEmapTemplateData($mapApply), $template);
            $template = str_replace($placeholder, $value, $data);
        }

        return view('emap::admin.step.form-print', compact('template', 'formDataType', 'formStore'));
    }

    public function uploadDocument(Request $request, FormStore $formStore)
    {
        $data =  $request->validate([
            'document' => ['required','file']
        ]);

        DB::transaction(function () use ($data, $request, $formStore) {
            $formStore->update($data);
            $existingFormStore = FormStore::find($formStore->id);
            FormStoreStatus::where('form_store_id', $formStore->id)
                ->orderBy('id', 'desc')
                ->where('status', DocumentStatusEnum::PENDING->value)
                ->first()?->update([
                    'document' => $existingFormStore->document
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

}
