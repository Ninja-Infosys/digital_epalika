<?php

namespace App\Providers;

use App\Models\ExecutiveMeeting\MunicipalCommittee;
use App\Models\ExecutiveMeeting\WardCommittee;
use App\Observers\ExecutiveMeeting\MunicipalCommitteeObserver;
use App\Observers\ExecutiveMeeting\WardCommitteeObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        MunicipalCommittee::observe(MunicipalCommitteeObserver::class);
        WardCommittee::observe(WardCommitteeObserver::class);
    }
}
