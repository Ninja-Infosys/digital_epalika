<?php

namespace Modules\EMap\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EMap\Entities\AttachDocument;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\AppliedDocument;
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
    public function index(MapApply $mapApply)
    {
    }

    public function create(MapApply $mapApply)
    {
    }

    public function store(Request $request, MapApply $mapApply, Form $form, FormDataType $formDataType)
    {
        if ($formDataType->type->value == FormTypeEnum::FILE->value) {
            $data =  $request->validate([
                'documents' => ['array', 'required'],
                'documents.*' => ['mimes:pdf']
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data) {
                $appliedDocument =   AppliedDocument::create([
                    'form_id' => $form->id,
                    'map_apply_id' => $mapApply->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id
                ]);
                AppliedDocumentStatus::create([
                    "applied_document_id" => $appliedDocument->id,
                    "status" => DocumentStatusEnum::PENDING->value
                ]);
                foreach ($data['documents'] as $file) {
                    $appliedDocument->appliedMapFiles()->create([
                        "map_apply_id" => $mapApply->id,
                        "document" => $file->store('appliedDocument', 'public'),
                    ]);
                }
            });
            toast('फाईल सफलतापूर्वक थपियो', 'success');
            return redirect(route('organization.admin.formDetail', [$mapApply, $form]));
        } else {

            $data =  $request->validate([
                'data' => ['required'],
            ]);
            DB::transaction(function () use ($request, $mapApply, $form, $data) {
                $formStore =   FormStore::create([
                    'form_id' => $form->id,
                    'map_apply_id' => $mapApply->id,
                    'status' => DocumentStatusEnum::PENDING->value,
                    'uploaded_by_type' => Organization::class,
                    'uploaded_by_id' => auth('organization')->user()->id,
                    'data' => json_encode($data['data']),
                    'fields' => json_encode($data['data'])
                ]);

                FormStoreStatus::create([
                    "form_store_id" => $formStore->id,
                    "status" => DocumentStatusEnum::PENDING->value,
                    "data" => json_encode($data['data']),
                    "fields" => json_encode($data['data'])
                ]);
            });
            toast('फारम सफलतापूर्वक थपियो', 'success');
            return redirect(route('organization.admin.formDetail', [$mapApply, $form]));
        }
    }

    public function show($id)
    {
        return view('emap::show');
    }

    public function edit($id)
    {
        return view('emap::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
