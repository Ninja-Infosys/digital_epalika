<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Enums\ApplicationTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Address\District;
use App\Notifications\ApplyMapNoticeNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Modules\EMap\Entities\ApplyMapNotice;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Enums\FileTypeEnum;
use Modules\EMap\Enums\NoticeTypeEnum;
use Modules\EMap\Enums\PostsEnum;

class MapController extends Controller
{
    public function index()
    {
        $application_types = collect();

        foreach (ApplicationTypeEnum::cases() as $applicationType) {
            $application_types->push($applicationType->value);
        }

        $maps = MapApply::with(['fiscalYear', 'organization:id,name', 'applyMapNotices'])->sentToAdmin()->get();

//            ->whereHas('applyMapNotices', function ($query) {
//            $query->selectRaw('id,map_apply_id,type,file_type,created_at')->where('type', FileTypeEnum::APPLICATION->value)->whereNull('rejected_at')->latest();
//        })->get();

        return view('emap::admin.map.index', compact('maps', 'application_types'));
    }

    public function show(MapApply $mapApply)
    {
        $mapApply->load(['fiscalYear', 'mapRegistration', 'mapRegistration.mapRegistrationParticulars', 'organization.organizationDetail', 'storeyDetails.mapFee', 'landDetail.unit', 'landOwner.citizenshipIssueDistrict', 'houseOwner.citizenshipIssueDistrict', 'fourForts', 'applicantDetail', 'criteriaDetails', 'buildingDetails', 'mapApplyApplications', 'applyMapNotices' => function ($query) {
            $query->latest();
        }]);
        $districts = District::all();

        return view('emap::admin.map.show', compact('mapApply', 'districts'));
    }

    public function rejectApplication(Request $request, MapApply $mapApply, ApplyMapNotice $applyMapNotice): \Illuminate\Routing\Redirector|Application|RedirectResponse
    {
        if ($applyMapNotice->rejected_at === null) {
            $applyMapNotice->update([
                'rejected_at' => now(),
                'remarks' => $request->input('remarks'),
            ]);
        } else {
            $applyMapNotice->update([
                'rejected_at' => null,
                'remarks' => null,
            ]);
        }

        toast('आवेदन सफलतापूर्वक अस्वीकार गरियो', 'success');

        return redirect(route('emap.admin.map.mapApply.show', $mapApply));
    }

    public function officeLetter(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(
            'landDetail',
            'houseOwner',
            'client'
        );

        return view('emap::admin.notice.office-letter', compact('mapApply'));
    }

    public function noticeLetter(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(
            'landDetail',
            'houseOwner'
        );

        return view('emap::admin.notice.notice-letter', compact('mapApply'));
    }

    public function sendingDetails(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail.unit', 'landOwner', 'houseOwner', 'storeyDetails.mapFee');

        return view('emap::admin.notice.sending_details', compact('mapApply'));
    }

    public function mapArrears(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail', 'houseOwner');

        return view('emap::admin.notice.map-arrears', compact('mapApply'));
    }

    public function landArrears(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail', 'houseOwner', 'landOwner');

        return view('emap::admin.notice.land-arrears', compact('mapApply'));
    }

    public function technicianNotice(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(
            'landDetail',
            'houseOwner',
            'fourForts',
            'criteriaDetails'
        );

        return view('emap::admin.notice.technician-notice', compact('mapApply'));
    }

    public function chAgreement(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(['houseOwner', 'designerDetails' => function ($query) {
            $query->where('post', PostsEnum::SUPERVISOR->value)->first();
        }]);

        return view('emap::admin.notice.ch-agreement', compact('mapApply'));
    }

    public function agentAgreement(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(['houseOwner', 'designerDetails' => function ($query) {
            $query->where('post', PostsEnum::CONTRACTOR->value)->first();
        }]);

        return view('emap::admin.notice.agent-agreement', compact('mapApply'));
    }

    public function permissionLetter(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail', 'landOwner', 'houseOwner');

        return view('emap::admin.notice.permission-letter', compact('mapApply'));
    }

    public function level(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(['landDetail.unit', 'landOwner', 'houseOwner', 'structureType',
            'criteriaDetails',
            'buildingDetails', ]);

        return view('emap::admin.notice.level', compact('mapApply'));
    }

    public function superVisor(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(['landDetail', 'houseOwner', 'designerDetails' => function ($query) {
            $query->where('post', PostsEnum::CONTRACTOR->value)->first();
        }]);

        return view('emap::admin.notice.supervisor', compact('mapApply'));
    }

    public function firstPhaseConsultantReport(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail', 'houseOwner');

        return view('emap::admin.map.report.first_phase_consultant_report', compact('mapApply'));
    }

    public function firstPhaseTechnicianReport(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail', 'houseOwner');

        return view('emap::admin.map.report.first_phase_technician_report', compact('mapApply'));
    }

    public function secondPhaseConsultantReport(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail', 'houseOwner');

        return view('emap::admin.map.report.second_phase_consultant_report', compact('mapApply'));
    }

    public function secondPhaseTechnicianReport(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail', 'houseOwner');

        return view('emap::admin.map.report.second_phase_technician_report', compact('mapApply'));
    }

    public function plinthLevelSupervisorReport(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(['landDetail', 'houseOwner', 'designerDetails' => function ($query) {
            $query->where('post', PostsEnum::CONTRACTOR->value)->first();
        }]);

        return view('emap::admin.map.report.plinth_level_supervisor_report', compact('mapApply'));
    }

    public function superStructurePermission(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(['landDetail', 'landOwner', 'houseOwner']);

        return view('emap::admin.notice.superstructure-permission', compact('mapApply'));
    }

    public function superstructure(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load(['landDetail', 'landOwner', 'houseOwner:id,name']);

        return view('emap::admin.notice.superstructure', compact('mapApply'));
    }

    public function revisedSuperStructurePermit(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landDetail.unit');

        return view('emap::admin.notice.revised_superstructure_permit', compact('mapApply'));
    }

    public function constructionCompletionCertificate(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landOwner', 'landDetail.unit');

        return view('emap::admin.notice.construction_completion_certificate', compact('mapApply'));
    }

    public function revisedSuperStructurePermitOrder(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('landOwner', 'landDetail.unit');

        return view('emap::admin.notice.revised_superstructure_permit_order', compact('mapApply'));
    }

    public function houseMapNamsari(MapApply $mapApply): View|Factory|Application
    {
        $mapApply->load('landOwner', 'houseOwner', 'landDetail.unit');

        return \view('emap::admin.notice.house_map_namsari', compact('mapApply'));
    }

    public function permissionView(MapApply $mapApply): View|Factory|Application
    {
        $mapApply->load('landOwner', 'houseOwner', 'landDetail.unit');

        return \view('emap::admin.notice.permission', compact('mapApply'));
    }

    public function heirView(MapApply $mapApply): View|Factory|Application
    {
        $mapApply->load('landOwner', 'houseOwner', 'landDetail.unit');

        return \view('emap::admin.notice.heir', compact('mapApply'));
    }

    public function buildingConstructionCompletionCertificate(MapApply $mapApply): View|Factory|Application
    {
        $mapApply->load('landOwner', 'houseOwner', 'landDetail.unit', 'structureType');

        return \view('emap::admin.notice.building_construction_completion_certificate', compact('mapApply'));
    }

    public function getTemplateData(MapApply $mapApply, NoticeTypeEnum $noticeTypeEnum)
    {
        $mapApply->load(['applyMapNotices.files', 'applyMapNotices' => function ($q) use ($noticeTypeEnum) {
            $q->where('file_type', $noticeTypeEnum->value)->latest()->first();
        }]);

        return \view('emap::admin.map.edit', compact('mapApply', 'noticeTypeEnum'));
    }

    public function storeTemplateData(Request $request, MapApply $mapApply, NoticeTypeEnum $noticeTypeEnum): RedirectResponse
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

        Notification::send($mapApply->organization, new ApplyMapNoticeNotification($mapApplyData));
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
}
