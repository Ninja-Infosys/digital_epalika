<?php

namespace Modules\EMap\Http\Controllers;

use App\Helper\SMS\SamayaSms;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Notifications\ApplyMapNoticeNotification;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Modules\EMap\Entities\ApplyMapNotice;
use Modules\EMap\Entities\BuildingDocumentation;
use Modules\EMap\Entities\BuildingDocumentationSetting;
use Modules\EMap\Entities\MapApply;
use Modules\EMap\Entities\NecessaryDocument;
use Modules\EMap\Entities\RegistrationDocument;
use Modules\EMap\Enums\EMapFormFillerTypeEnum;
use Modules\EMap\Enums\NoticeTypeEnum;

class FrontendController extends Controller
{
    public function eMap()
    {
        $necessaryDocuments = NecessaryDocument::with('files')->get();
        $registrationDocuments = RegistrationDocument::all();
        $buildingDocumentSetting = BuildingDocumentationSetting::first();

        return view('emap::frontend.e-map.index', compact('necessaryDocuments', 'registrationDocuments', 'buildingDocumentSetting'));
    }

    public function printForum(BuildingDocumentation $buildingDocumentation)
    {
        $buildingDocumentation->load(
            ['partners' => function ($query) {
                $query->all();
            }]
        );
        return view('emap::frontend.e-map.index', compact('buildingDocumentation'));
    }


    public function downloads()
    {
        return view('emap::frontend.e-map.downloads.downloads');
    }

    public function eHelp()
    {
        return view('emap::frontend.e-map.e-help.e-help');
    }

    public function form()
    {
        return view('emap::frontend.e-map.form.form');
    }
    public function buildingForm()
    {
        return view('emap::frontend.e-map.buildingForm.buildingForm');
    }
    public function register()
    {
        return view('emap::frontend.e-map.register.register-form');
    }

    public function mapTrack()
    {
        return view('emap::frontend.e-map.map_track.map_track');
    }

    public function formDetails()
    {
        return view('emap::frontend.e-map.map_track.form_details');
    }

    public function mapForm()
    {
        return view('emap::frontend.e-map.map_track.form');
    }

    public function track_Map(Request $request)
    {
        $request->validate([
            'submission_no' => ['required', 'exists:map_applies,unique_id'],
            'phone_no' => ['required'],
        ]);

        $mapApply = MapApply::whereHas('houseOwner', function ($query) use ($request) {
            $query->where('phone', $request->input('phone_no'));
        })
            ->where('unique_id', $request->input('submission_no'))
            ->first();
        if ($mapApply) {
            return redirect(route('track-data', $mapApply));
        }

        return back()->with('message', 'Record does not match !!!!');
    }

    public function trackData(MapApply $mapApply): Factory|View|Application
    {
        $mapApply->load('applyMapNotices:map_apply_id,file_type');

        return view('emap::frontend.e-map.map_track.form_details', compact('mapApply'));
    }

    public function loadTemplateData(MapApply $mapApply, NoticeTypeEnum $noticeTypeEnum): Factory|View|Application
    {
        if ($noticeTypeEnum->type() !== EMapFormFillerTypeEnum::OWNER) {
            abort(401);
        }

        $mapApply->load(['applyMapNotices' => function ($q) use ($noticeTypeEnum) {
            $q->where('file_type', $noticeTypeEnum->value)->latest()->first();
        }]);

        return view('emap::frontend.e-map.map_track.form', compact('mapApply', 'noticeTypeEnum'));
    }

    public function storeEmapTemplateData(Request $request, MapApply $mapApply, NoticeTypeEnum $noticeTypeEnum): Response|Application|ResponseFactory
    {
        if ($noticeTypeEnum->type() !== EMapFormFillerTypeEnum::OWNER) {
            abort(401);
        }

        if ($this->verifyOtp($request, $mapApply)) {
            $mapApplyData = ApplyMapNotice::updateOrCreate(
                [
                    'map_apply_id' => $mapApply->id,
                    'file_type' => $noticeTypeEnum->value,
                ],
                [
                    'data' => $request->input('data'),
                ]
            );

            Notification::send($mapApply->organization, new ApplyMapNoticeNotification($mapApplyData));
            return response([
                'message' => 'Added successfully !!',

            ], 200);
        }

        return response([
            'message' => 'otp does not matched',

        ], 419);
    }

    /**
     * @throws Exception
     */
    public function sendOtp(MapApply $mapApply): Response|Application|ResponseFactory
    {
        if (request()?->ajax()) {
            $number = random_int(111111, 999999);
            $mapApply->otp()->create([
                'otp' => $number,
            ]);

            $sms = (new SamayaSms())->sendTextSMS($mapApply->houseOwner->phone, "Dear Sir, Your Otp is $number, please do not share to anyone.");

            return response(['message' => 'Otp sent successfully'], 200);
        }
        return response(['message' => 'Something Wrong'], 500);
    }

    public function verifyOtp(Request $request, MapApply $mapApply): bool
    {
        $request->validate([
            'otp' => ['required', 'integer'],
        ]);

        $checkedMapApply = $mapApply->loadExists(['otp' => function ($q) use ($request) {
            $q->where('otp', $request->input('otp'));
        }]);


        return $checkedMapApply !== null && !$checkedMapApply->otp->is_expired;
    }

    public function download(File $file)
    {

        return Storage::disk('public')->download($file->file, $file->file_name . $file->extension);
    }

    public function downloadFile()
    {
        if (!empty($_GET['file_url']) && Storage::disk('public')->exists($_GET['file_url'])) {
            return Storage::disk('public')->download($_GET['file_url']);
        } else {
            toast('माफ गर्नुहोस् फाइल फेला परेन', 'error');
            return back();
        }
    }
}
