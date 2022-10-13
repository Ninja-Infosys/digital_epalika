<?php

use Illuminate\Support\Facades\Route;
use Modules\HelpDesk\Http\Controllers\{Admin\BranchController,
    Admin\DashboardController,
    Admin\ServiceController,
    Admin\ServiceEmployeeController};

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('branch', BranchController::class);
Route::resource('service', ServiceController::class);
Route::resource('service/{service}/serviceEmployee', ServiceEmployeeController::class)->names('service.serviceEmployee');
