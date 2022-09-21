<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Clients\ClientController;
use Modules\EMap\Http\Controllers\OrganizationDashboardController;


Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');

Route::prefix('clients')->as('clients.')->group(function () {
    Route::resource('client', ClientController::class);
});
