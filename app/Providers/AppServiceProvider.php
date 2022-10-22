<?php

namespace App\Providers;

use App\Models\OfficeHeader;
use App\Models\Settings\Units\Unit;
use App\Models\Website\MunicipalDetail;
use App\Observers\MunicipalDetailObserver;
use App\Observers\OfficeHeaderObserver;
use App\Observers\UnitObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        Paginator::useBootstrapFive();
    }

    public function boot()
    {
        Model::preventLazyLoading(!$this->app->isProduction());
        OfficeHeader::observe(OfficeHeaderObserver::class);
        Unit::observe(UnitObserver::class);
        MunicipalDetail::observe(MunicipalDetailObserver::class);

        Blade::componentNamespace('App\\View\\Components\\Navigation', 'admin');

        JsonResource::withoutWrapping();
    }
}
