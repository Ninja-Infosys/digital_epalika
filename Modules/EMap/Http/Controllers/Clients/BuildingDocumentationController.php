<?php

namespace Modules\EMap\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationStep;
use Modules\EMap\Entities\BuildingFormDataType;
use Modules\EMap\Entities\BuildingTemplateStore;
use Modules\EMap\Entities\FileTemplateStore;
use Modules\EMap\Traits\TemplateTrait;
use Illuminate\Support\Str;

class BuildingDocumentationController extends Controller
{
    use NepaliDateConverter;
    use TemplateTrait;
    public function index()
    {
        $buildingDocumentations = BuildingDocumentation::with('requiredDocument', 'neighbours', 'localBody')->where(function (Builder $q) {
            if (!is_null(request('search'))) {
                $q->whereLike(['house_owner_name', 'submission_no', 'registration_no'], request('search'));
            }
            if (!empty(request('to_date'))) {
                $q->whereDate('registration_date_ne', '>=', request('to_date'));
            }
            if (!empty(request('from_date'))) {
                $q->whereDate('registration_date_ne', '<=', request('from_date'));
            }
            if (!empty(request('registration_no'))) {
                $q->where('registration_no', request('registration_no'));
            }

        })->latest()
            ->paginate(15);

        return view('emap::organization.application-form.index', compact('buildingDocumentations'));
    }

    public function create()
    {
        return view('emap::organization.application-form.create');
    }

    public function show(BuildingDocumentation $buildingDocumentation)
    {
        return view('emap::organization.application-form.show', compact('buildingDocumentation'));
    }

    public function edit(BuildingDocumentation $buildingDocumentation)
    {
        return view('emap::organization.application-form.edit', compact('buildingDocumentation'));
    }

    public function buildingDocumentationList(BuildingDocumentation $buildingDocumentation)
    {
        [$forms, $order] = $this->buildingDocumentationForms($buildingDocumentation);
       return view('emap::organization.buildingDocumentationStep.index', compact('buildingDocumentation', 'forms', 'order' ));
   }

   public function documentDetail(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form)
   {
       $form->load('buildingFormDataTypes.model', 'buildingFormDataTypes.buildingDocuments.documentStatuses');
       return view('emap::organization.buildingDocumentationStep.create', compact('buildingDocumentation', 'form'));
   }

   public function templatePrint(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
   {
       $data = $this->getPrintData($buildingDocumentation, $form, $buildingFormDataType);
       return response()->json([
           'view' => (string)View::make('emap::organization.buildingDocumentationStep.print', compact('data')),
       ]);
   }

   public function templateEdit(BuildingDocumentation $buildingDocumentation, BuildingDocumentationStep $form, BuildingFormDataType $buildingFormDataType)
   {
       $data = $this->getPrintData($buildingDocumentation, $form, $buildingFormDataType);
       return view('emap::organization.template-edit.edit-file', compact('buildingDocumentation', 'data', 'buildingFormDataType', 'form'));
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
        return $buildingTemplateStore ?? Str::replace($this->getReplaceData(), $this->getEmapTemplateData($buildingDocumentation), $buildingFormDataType->model?->data);
    }
}
