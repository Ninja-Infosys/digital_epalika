<?php

use Illuminate\Support\Facades\Route;
use Modules\TaskManagement\Http\Controllers\Admin\ActivityController;
use Modules\TaskManagement\Http\Controllers\Admin\DashboardController;
use Modules\TaskManagement\Http\Controllers\Admin\ReportController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('activity', ActivityController::class);
//report
Route::controller(ReportController::class)->prefix('report')->as('report.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
});
