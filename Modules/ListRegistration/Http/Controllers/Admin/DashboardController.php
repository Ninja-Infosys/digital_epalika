<?php

namespace Modules\ListRegistration\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\OfficeSetting;
use App\Traits\NepaliDateConverter;
use Illuminate\Support\Collection;
use Modules\ListRegistration\Entities\ListRegistration;
use Modules\ListRegistration\Enums\ApplicantCategoryEnum;
use Modules\ListRegistration\Enums\BusinessNatureEnum;

class DashboardController extends Controller
{
    use NepaliDateConverter;

    protected Collection $listRegistrations;
    protected OfficeSetting $officeSetting;

    public function __construct()
    {
        parent::__construct();

        $this->officeSetting = OfficeSetting::with('localBody')->first();
        $this->listRegistrations = ListRegistration::where('fiscal_year_id', $this->officeSetting->fiscal_year_id)->get();
    }

    public function __invoke()
    {
        $nepali_date = $this->get_nepali_date(now()->format('Y'), now()->format('m'), now()->format('d'));

        $applicantTypeWiseData = $this->getApplicantTypeWiseData();
        $businessNatureWiseData = $this->getBusinessNatureWiseData();
        $totalRegistrations = ListRegistration::count();
        $yearlyRegistrations = $this->listRegistrations->count();
        $monthlyRegistrations = ListRegistration::where('fiscal_year_id', $this->officeSetting->fiscal_year_id)->whereMonth('date', $nepali_date['m'])->count();

        return view(
            'listregistration::admin.dashboard',
            compact(
            'applicantTypeWiseData',
            'businessNatureWiseData',
            'totalRegistrations',
            'yearlyRegistrations',
            'monthlyRegistrations'
        )
        );
    }

    private function getApplicantTypeWiseData()
    {
        $applicantTypeWiseData = collect();

        foreach (ApplicantCategoryEnum::cases() as $applicantType) {
            $applicantTypeWiseData->push([
                'applicant_type' => $applicantType->label(),
                'registrations_count' => $this->listRegistrations->where('applicant_type', $applicantType)->count()
            ]);
        }

        return [
            'labels' => $applicantTypeWiseData->pluck('applicant_type')->toArray(),
            'dataSets' => [
                [
                    'data' => $applicantTypeWiseData->pluck('registrations_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ]
            ],

        ];
    }

    private function getBusinessNatureWiseData()
    {
        $businessNatureWiseData = collect();

        foreach (BusinessNatureEnum::cases() as $businessNature) {
            $businessNatureWiseData->push([
                'business_nature' => $businessNature->label(),
                'registrations_count' => $this->listRegistrations->where('business_nature', $businessNature)->count()
            ]);
        }

        return [
            'labels' => $businessNatureWiseData->pluck('business_nature')->toArray(),
            'dataSets' => [
                [
                    'data' => $businessNatureWiseData->pluck('registrations_count')->toArray(),
                    'label' => 'जम्मा',
                    'fill' => 'false',
                ]
            ],

        ];
    }
}
