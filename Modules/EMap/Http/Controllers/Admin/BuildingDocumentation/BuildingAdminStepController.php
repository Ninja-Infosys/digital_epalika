<?php

namespace Modules\EMap\Http\Controllers\Admin\BuildingDocumentation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\BuildingStepNotification;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules\Enum;
use Modules\EMap\Entities\BuildingDocument;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\BuildingFormDataType;
use Modules\EMap\Entities\DocumentStatus;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\FormTypeEnum;
use Modules\EMap\Traits\TemplateTrait;

class BuildingAdminStepController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;

    public function buildingFormList(BuildingDocumentation $buildingDocumentation)
    {

        $buildingDocumentation->load('buildingHouseOwner');

        [$forms, $order] = $this->buildingDocumentationForms($buildingDocumentation);

        $mapGroups = DB::table('map_pass_group_user')->where('user_id', auth()->user()->id)->first() ?? null;


        return view('emap::admin.buildingDocumentation.step.buildingFormList', compact('buildingDocumentation', 'forms', 'order' ,'mapGroups'));
    }

    public function buildingFillDetail(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form)
    {
        $form->load('buildingFormDataTypes.model', 'buildingFormDataTypes.buildingDocuments', 'buildingFormDataTypes.buildingDocuments.documentStatuses');

        return view('emap::admin.buildingDocumentation.step.buildingFormFill', compact('buildingDocumentation', 'form'));
    }

    public function store(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        if ($buildingFormDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);

            DB::transaction(function () use ($request, $buildingDocumentation, $form, $data, $buildingFormDataType) {
                $buildingDocument = $buildingDocumentation->buildingDocuments()->create([
                    'building_documentation_step_id' => $form->id,
                    'status' => DocumentStatusEnum::APPROVED->value,
                    'uploaded_by_type' => User::class,
                    'uploaded_by_id' => auth()->user()->id,
                    'form_data_type' => BuildingFormDataType::class,
                    'form_data_id' => $buildingFormDataType->id
                ]);
                foreach ($data['documents'] as $file) {
                    $buildingDocument->documentFiles()->create([
                        "building_documentation_id" => $buildingDocumentation->id,
                        "document" => $file->store('buildingDocument', 'public'),
                    ]);
                }
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');
        }


        return redirect(route('emap.admin.buildingDocumentation.admin-step.fill-detail', [$buildingDocumentation, $form]));
    }

    public function update(Request $request,  BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType, $id)
    {
        if ($buildingFormDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);
            DB::transaction(function () use ($request, $buildingDocumentation, $form, $data, $id) {
                $buildingDocument = BuildingDocument::find($id);
                $documentStatus = DocumentStatus::create([
                    "building_document_id" => $buildingDocument->id,
                    "status" => DocumentStatusEnum::APPROVED->value
                ]);

                foreach ($buildingDocument->documentFiles as $existingFile) {
                    $documentStatus->documentFiles()->create([
                        "building_documentation_id" => $buildingDocumentation->id,
                        "document" => $existingFile->document,
                    ]);
                    $existingFile->forceDelete();
                }
                foreach ($data['documents'] as $file) {
                    $buildingDocument->documentFiles()->create([
                        "building_documentation_id" => $buildingDocumentation->id,
                        "document" => $file->store('buildingDocument', 'public'),
                    ]);
                }
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');
        }
        return redirect(route('emap.admin.buildingDocumentation.admin-step.fill-detail', [$buildingDocumentation, $form]));
    }
    public function viewDocumentDetail(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form)
    {
        $form->load('buildingFormDataTypes.model', 'buildingFormDataTypes.buildingDocuments');

        return view('emap::admin.buildingDocumentation.step.documentDetail', compact('buildingDocumentation', 'form'));
    }


    public function formDetail(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form)
    {
        $form->load('buildingFormDataTypes.model', 'buildingFormDataTypes.buildingDocuments.documentStatuses');

        return view('emap::admin.buildingDocumentation.step.buildingFormFileUpload', compact('buildingDocumentation', 'form'));
    }

    public function storeDocument(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
            $form->load('group.users');
            if ($buildingFormDataType->type == FormTypeEnum::FILE) {
                $data = $request->validate([
                    'documents' => ['array', 'required'],
                    'documents.*' => ['file'],
                ]);

                DB::transaction(function () use ($buildingDocumentation, $form, $data, $buildingFormDataType) {
                    $buildingDocument = $buildingDocumentation->buildingDocuments()->create([
                        'building_documentation_step_id' => $form->id,
                        'status' => DocumentStatusEnum::PENDING->value,
                        'uploaded_by_type' => User::class,
                        'uploaded_by_id' => auth()->user()->id,
                        'form_data_type' => BuildingFormDataType::class,
                        'form_data_id' => $buildingFormDataType->id,
                    ]);
                    foreach ($data['documents'] as $file) {
                        $buildingDocument->documentFiles()->create([
                            'building_documentation_id' => $buildingDocumentation->id,
                            'document' => $file->store('buildingDocument', 'public'),
                        ]);
                    }
                });
                toast('फाईल सफलतापूर्वक थपियो', 'success');

        }

        return redirect(route('emap.admin.buildingDocumentation.admin-step.formDetail', [$buildingDocumentation, $form]));
    }
    public function updateDocument(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType, $id)
    {
        $form->load('group.users');
        if ($buildingFormDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file'],
            ]);
            DB::transaction(function () use ($buildingDocumentation, $data, $id) {
                $buildingDocument = BuildingDocument::find($id);
                if ($buildingDocument->status == DocumentStatusEnum::PENDING) {
                    foreach ($buildingDocument->documentFiles as $existingFile) {
                        $existingFile->forceDelete();
                        foreach ($data['documents'] as $file) {
                            $buildingDocument->documentFiles()->create([
                                'building_documentation_id' => $buildingDocumentation->id,
                                'document' => $file->store('buildingDocument', 'public'),
                            ]);
                        }
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                } elseif ($buildingDocument->status == DocumentStatusEnum::REVIEW) {
                    toast('Document On Review You Cannot Change Document', 'error');
                } elseif ($buildingDocument->status == DocumentStatusEnum::APPROVED) {
                    toast('Document Is Already Approved', 'warning');
                } else {
                    $buildingDocument->update([
                        'status' => DocumentStatusEnum::PENDING->value,
                    ]);
                    $buildingDocumentStatus = DocumentStatus::create([
                        'building_document_id' => $buildingDocument->id,
                        'status' => DocumentStatusEnum::PENDING->value,
                    ]);
                    foreach ($buildingDocument->documentFiles as $existingFile) {
                        $existingFile->forceDelete();
                    }
                    foreach ($data['documents'] as $file) {
                        $newbuildingDocuments = $buildingDocument->documentFiles()->create([
                            'building_documentation_id' => $buildingDocumentation->id,
                            'document' => $file->store('buildingDocument', 'public'),
                        ]);

                        $buildingDocumentStatus->documentFiles()->create([
                            'building_documentation_id' => $buildingDocumentation->id,
                            'document' => $newbuildingDocuments->document,
                        ]);
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                }
            });
        }

        return redirect(route('emap.admin.buildingDocumentation.admin-step.formDetail', [$buildingDocumentation, $form]));
    }


    public function viewDetail(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form)
    {

        $buildingDocumentation->load('buildingHouseOwner');
        $form->load('buildingFormDataTypes.model', 'buildingFormDataTypes.buildingDocuments.documentStatuses', 'group');
        $checkUser = $form->group?->users?->pluck('id')->contains(auth()->user()->id);
        $mapGroups = DB::table('map_pass_group_user')->where('user_id', auth()->user()->id)->first() ?? null;
        $ward_no = $mapGroups ? explode(',', $mapGroups?->ward_no ?? '') : [];
        $checkAuthorization = in_array($buildingDocumentation->land_ward_no, $ward_no);

        return view('emap::admin.buildingDocumentation.step.buildingFormDetail', compact('buildingDocumentation', 'form', 'checkAuthorization'));
    }

    public function updateAppliedDocumentStatus(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType, BuildingDocument $buildingDocument)
    {
        $lastStep = BuildingDocumentationStep::orderBy('order', 'desc')->first()?->order ?? null;
        $firstId = BuildingDocumentationStep::orderBy('order')->first()?->id ?? null;
        $this->getStatusValidation($request);
        DB::transaction(function () use ($firstId, $request, $buildingDocumentation, $form, $buildingFormDataType, $buildingDocument, $lastStep) {
            if ($lastStep == $form->order) {
                $buildingDocumentStatus = BuildingDocument::where('id', '!=', $buildingDocument->id)
                    ->where('building_documentation_id', $buildingDocumentation->id)
                    ->where('building_documentation_step_id', $form->id)
                    ->pluck('status');


            } else {
                if ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                    $buildingDocumentation->update([
                        'sent_to_organization' => 'processing',
                    ]);
                    if ($form->id == $firstId && empty($buildingDocumentation->registration_no)) {
                        $buildingDocumentation->update([
                            'registration_date' => now(),
                            'registration_no' => BuildingDocumentation::whereFiscalYearId($buildingDocumentation->fiscal_year_id)->max('registration_no') + 1,
                        ]);
                    }
                }
            }

            if ($request->input('status') == DocumentStatusEnum::PENDING->value) {
                toast('Updated New Status', 'warning');
            } elseif ($request->input('status') == DocumentStatusEnum::REVIEW->value) {
                $buildingDocument->update([
                    'status' => $request->input('status'),
                ]);
                 DocumentStatus::where('building_document_id', $buildingDocument->id)
                    ->orderBy('id', 'desc')
                    ->first()?->update([
                        'status' => $request->input('status'),
                    ]);
                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            } elseif ($request->input('status') == DocumentStatusEnum::APPROVED->value) {
                if ($buildingDocument->status != DocumentStatusEnum::APPROVED) {
                    $buildingDocument->update([
                        'status' => $request->input('status'),
                    ]);
                     DocumentStatus::where('building_document_id', $buildingDocument->id)
                        ->orderBy('id', 'desc')
                        ->first()?->update([
                            'status' => $request->input('status'),
                        ]);
                    toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
                }
            } else {
                $buildingDocument->update([
                    'status' => $request->input('status'),
                ]);
                $appliedDocumentStatusData = $buildingDocument->documentStatuses()->create([
                    'building_document_id' => $buildingDocument->id,
                    'status' => $request->input('status'),
                    'comment' => $request->input('comment'),
                ]);
                foreach ($buildingDocument->documentFiles as $existingFile) {
                    $appliedDocumentStatusData->documentFiles()->create([
                        'building_documentation_id' => $buildingDocumentation->id,
                        'document' => $existingFile->document,
                    ]);
                }
                toast('स्थिति सफलतापूर्वक परिवर्तन गरियो', 'success');
            }
            Notification::send($buildingDocumentation->organization, new BuildingStepNotification($buildingDocumentation, $form, $buildingFormDataType, $buildingDocument));
        });

        return back();
    }
    public function getStatusValidation($request)
    {
        return $request->validate([
            'status' => ['required', 'string', new Enum(DocumentStatusEnum::class)],
            'comment' => ['required_if:status,' . DocumentStatusEnum::MODIFY->value],
        ]);
    }


}
