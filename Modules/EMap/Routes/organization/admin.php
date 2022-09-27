<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Clients\ClientController;
use Modules\EMap\Http\Controllers\Clients\MapApplyController;
use Modules\EMap\Http\Controllers\OrganizationAuthController;
use Modules\EMap\Http\Controllers\OrganizationDashboardController;


Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');

Route::prefix('profile')->group(function () {
    Route::get('/', [OrganizationAuthController::class, 'profile'])->name('auth-organization.profile');
});

Route::prefix('clients')->as('clients.')->group(function () {
    Route::resource('client', ClientController::class);
    Route::resource('client/{client}/mapApply', MapApplyController::class)->names('mapApply');
});
