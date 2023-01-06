<?php

use Modules\OrganizationRegistration\Http\Controllers\Admin\BusinessController;
use Modules\OrganizationRegistration\Http\Controllers\Admin\DashboardController;


Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('business', BusinessController::class);
