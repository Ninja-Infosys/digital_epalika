<?php

namespace Modules\EMap\Http\Controllers\Admin;

use App\Enums\ApplicationTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ApplyMapNoticeNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Modules\EMap\Entities\ApplyMapApplication;
use Modules\EMap\Entities\MapApply;

class MapController extends Controller
{
    public function index()
    {
        $application_types = collect();

        foreach (ApplicationTypeEnum::cases() as $applicationType) {
            $application_types->push($applicationType->value);
        }

        $maps = MapApply::with(['fiscalYear', 'organization:id,name', 'mapApplyApplications'])->whereHas('mapApplyApplications', function ($query) {
            $query->selectRaw('id,map_apply_id,file_type,created_at')->whereNull('rejected_at')->latest();
        })->get();


        return view('emap::admin.map.index', compact('maps', 'application_types'));
    }

    public function show(MapApply $mapApply)
    {
        $mapApply->load(['fiscalYear', 'mapRegistration', 'mapRegistration.mapRegistrationParticulars', 'organization.organizationDetail', 'storeyDetails.mapFee', 'landDetail.unit', 'landOwner.citizenshipIssueDistrict', 'houseOwner.citizenshipIssueDistrict', 'fourForts', 'applicantDetail', 'criteriaDetails', 'buildingDetails', 'mapApplyApplications' => function ($query) {
            $query->latest();
        }]);
        return view('emap::admin.map.show', compact('mapApply'));

    }

    public function rejectApplication(MapApply $mapApply, ApplyMapApplication $applyMapApplication)
    {
        if ($applyMapApplication->rejected_at == null) {
            $applyMapApplication->update(['rejected_at' => now()]);
        } else {
            $applyMapApplication->update(['rejected_at' => null]);
        }

        toast('आवेदन सफलतापूर्वक अस्वीकार गरियो', 'success');
        return redirect(route('emap.admin.map.mapApply.show', $mapApply));
    }

    public function officeLetter(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.office-letter',compact('mapApply'));
    }

    public function noticeLetter(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.notice-letter',compact('mapApply'));
    }

    public function mapArrears(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.map-arrears',compact('mapApply'));
    }

    public function landArrears(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.land-arrears',compact('mapApply'));
    }

    public function technicianNotice(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.technician-notice',compact('mapApply'));
    }

    public function chAgreement(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.ch-agreement',compact('mapApply'));
    }

    public function agentAgreement(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.agent-agreement',compact('mapApply'));
    }

    public function permissionLetter(MapApply $mapApply): Factory|View|Application
    {
        return view('emap::admin.notice.permission-letter',compact('mapApply'));
    }

    public function level(MapApply $mapApply)
    {
        return view('emap::admin.notice.level',compact('mapApply'));
    }


    public function applyMapNotice(Request $request,MapApply $mapApply): RedirectResponse
    {
        $data = $request->validate([
            'file' => ['required', 'mimes:pdf'],
            'file_type' => ['required']
        ]);
        $mapApplyData = $mapApply->applyMapNotices()->create($data);

        Notification::send(User::all(), new ApplyMapNoticeNotification($mapApplyData));
        toast('फाईल सफलता पुर्बक थपियो', 'success');
        return back();
    }
}
