<?php

namespace App\Http\Controllers;

use App\Models\OfficeHeader;
use App\Models\Settings\Employee;
use App\Models\Website\ImportantLink;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Entities\Notice;
use Modules\Identity\Entities\DisabilityIdentityCard;
use Modules\Identity\Entities\SeniorCitizenDetail;

class FrontController extends Controller
{
    use NepaliDateConverter;

    public function __construct()
    {
        parent::__construct();
        view()->share('important_links', ImportantLink::all());
    }

    public function index()
    {
         $checkRoutes = collect([
            "grievanceHandling" =>Route::has('grievanceHandling.grievance'),
            "ebps" =>Route::has('ebps'),
            "digitalBoard" =>Route::has('digitalBoard.helpdesk.helpdesk'),
            "recommendation" =>Route::has('recommendationrecommendation.index'),
            "businessRegistration" =>Route::has('businessRegistration.business'),
            "grant" =>Route::has('grant.index'),
            "payment" =>Route::has('payment.index'),
            "complaintApplication" =>Route::has('complaintApplication.complainRegistration'),
            "roaster" =>Route::has('roaster.index')
        ]);

        if(config('app.disable_main_page')) {
            return redirect(route('newWard'));
        }
        if (!$this->checkModuleExistence('DigitalBoard')) {
            return view('frontend.digital_board');
        }


         if ($checkRoutes->filter()->count() > 1) {
            return redirect(route('digital-service'));
        } else {
            if(Route::has('ebps')){
                return redirect(route('ebps'));
            }
            return redirect(route('digital-service'));
        }
    }

    public function digitalService()
    {
        return view('frontend.welcome');
    }


    public function notice($ward)
    {
        $notices = Notice::where('type', 'Notice')->orderBy('date')->get();

        return view('frontend.static.notice.index', compact('notices'));
    }

    public function singleNotice(Notice $notice)
    {
        $notice->load('files');

        return view('frontend.static.notice.single-notice', compact('notice'));
    }

    public function contact()
    {
        return view('frontend.static.contact.index');
    }

    public function introduction()
    {
        return view('frontend.static.introduction');
    }

    public function category(): void
    {
        //        return view('frontend.static.category.category');
    }

    //    public function representative()
    //    {
    //        $representatives = Employee::all();
    //        return view('components.frontend.employee-section-component', compact('representatives'));
    //    }

    public function audio()
    {
        return view('frontend.static.gallery.audio.audio');
    }

    public function photo()
    {
        return view('frontend.static.gallery.photo.photo');
    }

    public function single_photo()
    {
        return view('frontend.static.gallery.photo.single-photo');
    }

    public function video()
    {
        return view('frontend.static.gallery.video.video');
    }

    public function employee()
    {
        return view('frontend.static.employee.index');
    }

    public function aboutUs()
    {
        return view('frontend.static.about_us');
    }

    public function org()
    {
        return view('frontend.static.org.org');
    }

    public function executive()
    {
        return view('frontend.static.executive-board.index');
    }

    public function single_executive(): void
    {
        //        return view('frontend.static.executive-board.single-executive-board');
    }

    public function service_details(): void
    {
        //        return view('frontend.static.chat.service');
    }

    public function seniorCitizenDetailQrcode(SeniorCitizenDetail $seniorCitizenDetail)
    {
        $seniorCitizenDetail->load('fingerPrints', 'employeeSignature', 'province', 'district', 'localBody');
        $officeHeaders = OfficeHeader::get();
        $todayDate = $this->get_today_nepali_date();
        return view('frontend.seniorCitizenprint', compact('todayDate', 'seniorCitizenDetail', 'officeHeaders'));
    }

    public function disabilityIdentityCardQrcode(DisabilityIdentityCard $disabilityIdentityCard)
    {
        $disabilityIdentityCard->load('fingerPrints', 'employeeSignature', 'disabilityType', 'governmentalDisabilityType', 'permanentProvince', 'permanentDistrict', 'permanentLocalBody');
        $officeHeaders = OfficeHeader::get();
        $todayDate = $this->get_today_nepali_date();
        return view('frontend.disabilityPrint', compact('todayDate', 'disabilityIdentityCard', 'officeHeaders'));
    }

    public function wardIndex($ward)
    {
        return view('frontend.wardIndex', compact('ward'));
    }


}
