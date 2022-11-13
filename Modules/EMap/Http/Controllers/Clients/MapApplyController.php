<?php

namespace Modules\EMap\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Models\User;
use App\Notifications\ApplyMapNoticeNotification;
use App\Notifications\MapApplicationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\EMap\Entities\ApplyMapNotice;
use Modules\EMap\Entities\Client;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\MapSetting;
use Modules\EMap\Enums\NoticeTypeEnum;
use function Termwind\renderUsing;

class MapApplyController extends Controller
{
    public function index()
    {
        $mapApplies = MapApply::with('houseOwner')->where('organization_id', auth('organization')->user()->id)->get();
        return view('emap::organization.map-applies.index', compact('mapApplies'));
    }

    public function show(MapApply $mapApply)
    {

        $districts = District::get();
        $mapApply->load('fiscalYear', 'storeyDetails.mapFee', 'landDetail.unit', 'landOwner.citizenshipIssueDistrict', 'houseOwner.citizenshipIssueDistrict', 'fourForts', 'applicantDetail', 'criteriaDetails', 'buildingDetails');

        return view('emap::organization.map-applies.show', compact('mapApply', 'districts'));
    }

    public function edit(MapApply $mapApply)
    {
        $mapSetting = MapSetting::first();
        return view('emap::organization.map-applies.edit', compact('mapSetting', 'mapApply'));
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
        return view('emap::organization.map-applies.map_form_info', compact('mapApply'));
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
            'files.*' => ['mimes:jpg,png,jpeg,pdf']
        ]);

        $mapApplyData = DB::transaction(function () use ($request, $mapApply, $noticeTypeEnum) {
            $mapApplyData = ApplyMapNotice::updateOrCreate([
                'map_apply_id' => $mapApply->id,
                'file_type' => $noticeTypeEnum->value
            ],
                [
                    'data' => $request->input('data'),
                ]);

            if ($request->hasFile('files')) {
                $this->uploadDocuments($request, $mapApplyData);
            }

            return $mapApplyData;
        });

        Notification::send(User::all(), new MapApplicationNotification($mapApplyData));

        toast('फाईल सफलता पुर्बक थपियो', 'success');
        return back();
    }


    private function uploadDocuments($request, $mapApplyData): void
    {
        foreach ($request->file('files') as $document) {
            $mapApplyData->files()->create([
                'file_name' => pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME),
                'extension' => $document->getClientOriginalExtension(),
                'file' => $document->store('emapTemplateFile', 'public')
            ]);
        }
    }


    public function updateStatus(MapApply $mapApply)
    {
        $mapApply->update([
            'sent_to_admin_at' => empty($mapApply->sent_to_admin_at) ? now() : null
        ]);

        toast('सफलता पुर्बक अद्यावधिक गरियो', 'success');
        return back();

    }
}
