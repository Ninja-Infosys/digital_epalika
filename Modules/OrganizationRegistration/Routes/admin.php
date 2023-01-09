<?php

use Illuminate\Support\Facades\Route;
use Modules\OrganizationRegistration\Http\Controllers\Admin\BusinessController;
use Modules\OrganizationRegistration\Http\Controllers\Admin\DashboardController;
use Modules\OrganizationRegistration\Http\Controllers\BusinessRenewController;


Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('business', BusinessController::class);
Route::get('business/{business}/updateStatus', [BusinessController::class, 'updateStatus'])->name('business.updateStatus');
Route::resource('business.businessRenew',BusinessRenewController::class)->names('business.businessRenew');
