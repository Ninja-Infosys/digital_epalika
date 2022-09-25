<?php

namespace App\Providers;

use App\Models\ExecutiveMeeting\MunicipalCommittee;
use App\Models\ExecutiveMeeting\WardCommittee;
use App\Models\OfficeHeader;
use App\Models\Settings\OfficeSetting;
use App\Models\Website\ImportantLink;
use App\Models\Website\MunicipalDetail;
use App\Observers\ExecutiveMeeting\MunicipalCommitteeObserver;
use App\Observers\ExecutiveMeeting\WardCommitteeObserver;
use App\Observers\MunicipalDetailObserver;
use App\Observers\OfficeHeaderObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        view()->share('important_links', ImportantLink::all());
        view()->share('officeSetting', OfficeSetting::with('fiscalYear', 'district', 'localBody')->first());
        OfficeHeader::observe(OfficeHeaderObserver::class);
        MunicipalCommittee::observe(MunicipalCommitteeObserver::class);
        WardCommittee::observe(WardCommitteeObserver::class);
        MunicipalDetail::observe(MunicipalDetailObserver::class);
    }
}
