<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\BuildingStepNotification;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\BuildingFormDataType;
use Modules\EMap\Entities\BuildingTemplateStore;
use Modules\EMap\Entities\Organization;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\FormTypeEnum;
use Illuminate\Support\Str;
use Modules\EMap\Enums\NoticeTypeEnum;
use Modules\EMap\Traits\TemplateTrait;

class BuildingDocumentationStepController extends Controller
{
    use NepaliDateConverter, TemplateTrait;

    public function buildingDocumentationList(BuildingDocumentation $buildingDocumentation)
    {
        [$forms, $order] = $this->buildingDocumentationForms($buildingDocumentation);

        return view('emap::organization.buildingDocumentationStep.index', compact('buildingDocumentation', 'forms', 'order'));
    }

    public function documentDetail(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form)
    {
        $form->load('buildingFormDataTypes.model','buildingFormDataTypes.buildingDocuments.documentStatuses');
        return view('emap::organization.buildingDocumentationStep.create', compact('buildingDocumentation', 'form'));
    }
    public function viewDetail(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form)
    {
        $form->load('buildingFormDataTypes.model', 'buildingFormDataTypes.buildingDocuments');
        return view('emap::organization.buildingDocumentationStep.viewDetail', compact('buildingDocumentation', 'form'));
    }

    public function templatePrint(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        $data = $this->getPrintData($buildingDocumentation, $form, $buildingFormDataType);
        return response()->json([
            'view' => (string) View::make('emap::organization.buildingDocumentationStep.print', compact('data')),
        ]);
    }

    public function templateEdit(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        $data = $this->getPrintData($buildingDocumentation, $form, $buildingFormDataType);
        return view('emap::organization.template-edit.template-edit', compact('buildingDocumentation', 'data', 'buildingFormDataType', 'form'));
    }



    public function storeFileTemplate(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        $request->validate([
            'data' => ['required']
        ]);
       BuildingTemplateStore::updateOrCreate([
            'building_documentation_id' => $buildingDocumentation->id,
            'building_documentation_step_id' => $form->id,
            'building_form_data_type_id' => $buildingFormDataType->id,
        ], ['data' => $request->input('data')]);
        toast('टेम्प्लेट विवरण सम्पादन सफलतापूर्वक गरियो', 'success');
        return redirect(route('organization.admin.documentDetail', [$buildingDocumentation, $form])  );
    }
    public function getPrintData(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType): string
    {
        $buildingTemplateStore = BuildingTemplateStore::where('building_documentation_id', $buildingDocumentation->id)
        ->where('building_documentation_step_id', $form->id)
        ->where('building_form_data_type_id', $buildingFormDataType->id)
        ->first()?->data ?? null;

        $buildingFormDataType->load('model');
        $buildingDocumentation->load(
            'buildingStoreyDetails',
            'neighbours',
            'files',
            'localBody',
            'district',
            'province',
            'fiscalYear',
            'requiredDocument',
        );
        return $buildingTemplateStore ?? Str::replace($this->getBuildingReplaceData(), $this->getBuildingTemplateData($buildingDocumentation), $buildingFormDataType->model?->data);
    }

    public function store(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
    {
        $form->load('group.users');
        if ($buildingFormDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);

            DB::transaction(function () use ($request, $buildingDocumentation, $form, $data, $buildingFormDataType) {
                $buildingDocument = $buildingDocumentation->buildingDocuments()->create([
                    'building_documentation_step_id' => $form->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'form_data_type' => BuildingFormDataType::class,
                    'form_data_id' => $buildingFormDataType->id
                ]);
                foreach ($data['documents'] as $file) {
                    $buildingDocument->documentFiles()->create([
                        "building_documentation_id" => $buildingDocumentation->id,
                        "document" => $file->store('buildingDocument', 'public'),
                    ]);
                }

                Notification::send($form->group->users, new BuildingStepNotification($buildingDocumentation, $form, $buildingFormDataType, $buildingDocument));
            });

            toast('फाईल सफलतापूर्वक थपियो', 'success');

            return redirect(route('organization.admin.documentDetail', [$buildingDocumentation, $form]));
        }
    }

    public function update(Request $request, BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType, $id)
    {
        $form->load('group.users');
        if ($buildingFormDataType->type == FormTypeEnum::FILE) {
            $data = $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['file']
            ]);


            DB::transaction(function () use ($request, $buildingDocumentation, $form, $buildingFormDataType, $data, $id) {
                $buildingDocument = $buildingDocumentation->buildingDocuments()->find($id);
                if ($buildingDocument->status == DocumentStatusEnum::PENDING) {
                    foreach ($buildingDocument->documentFiles as $existingFile) {
                        $existingFile->forceDelete();
                    }
                    foreach ($data['documents'] as $file) {
                        $buildingDocument->documentFiles()->create([
                            "building_documentation_id" => $buildingDocumentation->id,
                            "document" => $file->store('buildingDocument', 'public'),
                        ]);
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                } elseif ($buildingDocument->status == DocumentStatusEnum::REVIEW) {
                    toast('Document On Review You Cannot Change Document', 'error');
                } elseif ($buildingDocument->status == DocumentStatusEnum::APPROVED) {
                    toast('Document Is Already Approved', 'warning');
                } else {
                    $buildingDocument->update([
                        'status' => DocumentStatusEnum::PENDING->value
                    ]);
                    $buildingDocumentStatus = $buildingDocument->documentStatuses()->create([
                        "status" => DocumentStatusEnum::PENDING->value
                    ]);
                    foreach ($buildingDocument->documentFiles as $existingFile) {
                        $existingFile->forceDelete();
                    }
                    foreach ($data['documents'] as $file) {
                        $newBuildingDocument = $buildingDocument->documentFiles()->create([
                            "building_documentation_id" => $buildingDocumentation->id,
                            "document" => $file->store('buildingDocument', 'public'),
                        ]);

                        $buildingDocumentStatus->documentFiles()->create([
                            "building_documentation_id" => $buildingDocumentation->id,
                            "document" => $newBuildingDocument->document,
                        ]);
                    }
                    toast('फाईल सफलतापूर्वक थपियो', 'success');
                }

                Notification::send($form->group->users, new BuildingStepNotification($buildingDocumentation, $form, $buildingFormDataType, $buildingDocument));
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');

            return redirect(route('organization.admin.documentDetail', [$buildingDocumentation, $form]));
        }
    }




}

