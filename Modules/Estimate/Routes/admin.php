<?php

use Illuminate\Support\Facades\Route;
use Modules\Estimate\Http\Controllers\Admin\DashboardController;

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('dashboard/ajax', [DashboardController::class, 'ajaxData'])->name('dashboard.ajax');
