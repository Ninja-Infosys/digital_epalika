<?php

use App\Http\Controllers\Admin\Setting\BranchController;
use Illuminate\Support\Facades\Route;
use Modules\HelpDesk\Http\Controllers\{Admin\DashboardController,
    Admin\ServiceController,
    Admin\ServiceEmployeeController};

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('service', ServiceController::class);
Route::resource('service/{service}/serviceEmployee', ServiceEmployeeController::class)->names('service.serviceEmployee');
