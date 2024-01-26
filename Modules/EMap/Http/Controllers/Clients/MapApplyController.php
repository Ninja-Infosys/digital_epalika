<?php

namespace Modules\EMap\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ApplyMapNoticeNotification;
use App\Notifications\MapApplyNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\EMap\Entities\AppliedDocument;
use Modules\EMap\Entities\ApplyMapNotice;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Enums\NoticeTypeEnum;
use Modules\EMap\Entities\Form;
use Modules\EMap\Entities\FormStore;
use Modules\EMap\Entities\PaymentStore;
use Modules\EMap\Enums\DocumentStatusEnum;
use Modules\EMap\Enums\EMapFormFillerTypeEnum;

class MapApplyController extends Controller
{
    public function index()
    {
        $mapApplies = MapApply::with('houseOwner')
            ->where('organization_id', auth('organization')->user()->id)
            ->latest()
            ->get();

        return view('emap::organization.map-applies.index', compact('mapApplies'));
    }

    public function show(MapApply $mapApply)
    {
        $districts = get_districts();
        $mapApply->load('fiscalYear', 'storeyDetails.mapFee', 'landDetail.unit', 'landOwner.citizenshipIssueDistrict', 'houseOwner.citizenshipIssueDistrict', 'fourForts', 'applicantDetail', 'criteriaDetails', 'buildingDetails');

        return view('emap::organization.map-applies.show', compact('mapApply', 'districts'));
    }

    public function edit(MapApply $mapApply)
    {
        $mapSetting = MapSetting::first();

        return view('emap::organization.map-applies.edit', compact('mapSetting', 'mapApply'));
    }

    public function formList(MapApply $mapApply)
    {
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

        $forms = Form::with('formDataTypes.form.dynamicForm', 'formStores', 'paymentStores', 'appliedDocuments')
        ->orderBy('order')
        ->get()->map(function ($form) use ($documents) {
            $status = $documents->where('form_id', $form->id)->pluck('status');
            $form->is_rejected = $status->contains(DocumentStatusEnum::REJECTED->value) ? true : false;
            return $form;
        });

        $order = $forms->min('order');
        $activeStep = $mapApply->activeStep();

        if (!empty($activeStep) && array_key_exists('status', $activeStep) && !empty($activeStep['status'])) {
            $allApproved = true;

            foreach ($activeStep['status'] as $item) {
                if ($item !== 'approved') {
                    $allApproved = false;
                    break;
                }
            }

            if ($allApproved) {
                $order = $forms->where('order', '>', $activeStep['order'])
                ->where('need_from', EMapFormFillerTypeEnum::ORGANIZATION)
                    ->sortBy('order')
                    ->first()
                    ?->order;
            } else {
                $order = $activeStep['order'];
            }
        }

        return view('emap::organization.attach-document.index', compact('mapApply', 'forms', 'order'));
    }

    public function formDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments.appliedDocumentStatuses', 'formDataTypes.formStores.formStoreStatuses', 'formDataTypes.paymentStores.paymentStoreStatuses');
        return view('emap::organization.attach-document.create', compact('mapApply', 'form'));
    }

    public function viewDetail(MapApply $mapApply, Form $form)
    {
        $form->load('formDataTypes.model', 'formDataTypes.appliedDocuments', 'formDataTypes.formStores');
        return view('emap::organization.attach-document.viewDetail', compact('mapApply', 'form'));
    }

    public function update(Request $request, MapApply $mapApply)
    {
        //
    }

    public function destroy(MapApply $mapApply)
    {
        //
    }

    public function mapFormInfo(MapApply $mapApply)
    {
        $mapApply->load('applyMapNotices:map_apply_id,file_type,sent_to_admin_at,type,remarks');
        $fileTypes = $mapApply->applyMapNotices->pluck('file_type');

        return view('emap::organization.map-applies.map_form_info', compact('mapApply', 'fileTypes'));
    }

    public function getTemplateData(MapApply $mapApply, NoticeTypeEnum $noticeTypeEnum)
    {
        $mapApply->load(['applyMapNotices' => function ($q) use ($noticeTypeEnum) {
            $q->where('file_type', $noticeTypeEnum->value)->latest()->first();
        }]);

        return \view('emap::organization.map-applies.template_data', compact('mapApply', 'noticeTypeEnum'));
    }

    public function storeTemplateData(Request $request, MapApply $mapApply, NoticeTypeEnum $noticeTypeEnum)
    {
        $request->validate([
            'data' => ['required'],
            'files' => ['nullable', 'array'],
            'files.*' => ['mimes:jpg,png,jpeg,pdf'],
        ]);

        $mapApplyData = DB::transaction(function () use ($request, $mapApply, $noticeTypeEnum) {
            $mapApplyData = ApplyMapNotice::updateOrCreate(
                [
                    'map_apply_id' => $mapApply->id,
                    'file_type' => $noticeTypeEnum->value,
                ],
                [
                    'data' => $request->input('data'),
                ]
            );

            if (!$mapApplyData->wasChanged()) {
                $mapApplyData->update([
                    'sent_to_admin_at' => now()
                ]);
            }


            if ($request->hasFile('files')) {
                $this->uploadDocuments($request, $mapApplyData);
            }

            return $mapApplyData;
        });

        Notification::send(User::all(), new ApplyMapNoticeNotification($mapApply, $mapApplyData));

        toast('फाईल सफलता पुर्बक थपियो', 'success');

        return back();
    }

    private function uploadDocuments($request, $mapApplyData): void
    {
        foreach ($request->file('files') as $document) {
            $mapApplyData->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('emapTemplateFile', 'public'),
            ]);
        }
    }

    public function updateStatus(MapApply $mapApply)
    {
        $mapApply->update([
            'sent_to_admin_at' => empty($mapApply->sent_to_admin_at) ? now() : null,
        ]);

        Notification::send(User::all(), new MapApplyNotification($mapApply));
        toast('सफलता पुर्बक अद्यावधिक गरियो', 'success');
        return back();
    }

    public function updateStatusOrganization(MapApply $mapApply, NoticeTypeEnum $noticeTypeEnum)
    {
        $data = ApplyMapNotice::where('map_apply_id', $mapApply->id)->where('file_type', $noticeTypeEnum->value)->first();
        $data->update([
            'sent_to_admin_at' => empty($data->sent_to_admin_at) ? now() : null
        ]);

        Notification::send(User::all(), new ApplyMapNoticeNotification($mapApply, $data));
        toast('सफलता पुर्बक अद्यावधिक गरियो', 'success');

        return back();
    }
}
