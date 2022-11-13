<?php

use Illuminate\Support\Facades\Route;
use Modules\HelpDesk\Http\Controllers\Admin\DashboardController;
use Modules\HelpDesk\Http\Controllers\Admin\ServiceController;
use Modules\HelpDesk\Http\Controllers\Admin\ServiceEmployeeController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('service', ServiceController::class);
Route::resource('service/{service}/serviceEmployee', ServiceEmployeeController::class)->names('service.serviceEmployee');
