<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\ApplicationController;
use Modules\EMap\Http\Controllers\ApplyMapApplicationController;
use Modules\EMap\Http\Controllers\Clients\ClientController;
use Modules\EMap\Http\Controllers\Clients\MapApplyController;
use Modules\EMap\Http\Controllers\OrganizationAuthController;
use Modules\EMap\Http\Controllers\OrganizationDashboardController;


Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');

Route::prefix('profile')->group(function () {
    Route::get('/', [OrganizationAuthController::class, 'profile'])->name('auth-organization.profile');
});

Route::prefix('clients')->as('clients.')->group(function () {
    Route::controller(ApplicationController::class)
        ->prefix('client/{client}/mapApply/{mapApply}/application')
        ->as('application.')->group(function () {
            Route::get('mapAcceptance', 'mapAcceptance')->name('map-acceptance');
            Route::get('technicianApproval', 'technicianApproval')->name('technician-approval');
            Route::get('engineerApproval', 'engineerApproval')->name('engineer-approval');
        });
    Route::controller(ApplyMapApplicationController::class)
        ->prefix('client/{client}/mapApply/{mapApply}/applyMapApplication')
        ->as('applyMapApplication.')->group(function (){
            Route::get('applyMapApplication','applyMapApplicationForm')->name('apply-mapApplication');
            Route::post('applyMapApplication','applyMapApplication')->name('apply-mapApplication');
        });
    Route::resource('client/{client}/mapApply', MapApplyController::class)->names('mapApply');
    Route::resource('client', ClientController::class);
});
