<?php

namespace App\Providers;

use App\Models\ExecutiveMeeting\MunicipalCommittee;
use App\Models\ExecutiveMeeting\WardCommittee;
use App\Models\OfficeHeader;
use App\Models\Settings\OfficeSetting;
use App\Observers\ExecutiveMeeting\MunicipalCommitteeObserver;
use App\Observers\ExecutiveMeeting\WardCommitteeObserver;
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
        view()->share('officeSetting', OfficeSetting::first());
        OfficeHeader::observe(OfficeHeaderObserver::class);
        MunicipalCommittee::observe(MunicipalCommitteeObserver::class);
        WardCommittee::observe(WardCommitteeObserver::class);
    }
}
