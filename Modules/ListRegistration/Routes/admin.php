<?php

use Illuminate\Support\Facades\Route;
use Modules\ListRegistration\Http\Controllers\Admin\DashboardController;
use Modules\ListRegistration\Http\Controllers\Admin\ListRegistrationController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('listRegistration', ListRegistrationController::class);
