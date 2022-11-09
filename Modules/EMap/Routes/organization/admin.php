<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\ApplicationController;
use Modules\EMap\Http\Controllers\ApplyMapApplicationController;
use Modules\EMap\Http\Controllers\Clients\ClientController;
use Modules\EMap\Http\Controllers\Clients\MapApplyController;
use Modules\EMap\Http\Controllers\OrganizationAuthController;
use Modules\EMap\Http\Controllers\OrganizationDashboardController;
use Modules\EMap\Http\Controllers\TaxClearanceController;


Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');

Route::prefix('profile')->group(function () {
    Route::get('/', [OrganizationAuthController::class, 'profile'])->name('auth-organization.profile');
});

Route::prefix('clients')->as('clients.')->group(function () {
    Route::controller(ApplicationController::class)
        ->prefix('client/{client}/mapApply/{mapApply}/application')
        ->as('application.')->group(function () {
            Route::get('mapAcceptance', 'mapAcceptance')->name('map-acceptance');
            Route::get('super-structure-construction-permission', 'superStructureConstructionPermission')->name('super-structure-construction-permission');
            Route::get('construction-completion-certificate', 'constructionCompletionCertificate')->name('constructionCompletionCertificate');
            Route::get('technicianApproval', 'technicianApproval')->name('technician-approval');
            Route::get('engineerApproval', 'engineerApproval')->name('engineer-approval');
            Route::post('applyMapApplication','applyMapApplication')->name('apply-map-application');
        });

    Route::resource('mapApply', MapApplyController::class)->names('map.apply');
    Route::resource('client', ClientController::class);
    Route::resource('taxClearance', TaxClearanceController::class);
});
