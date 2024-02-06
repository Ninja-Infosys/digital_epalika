<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Clients\Api\OrganizationApplicationsController;

Route::controller(OrganizationApplicationsController::class)->group(function () {
    Route::get('applications', 'mapApplications')->name('map-applications');
});
