<?php

use Illuminate\Support\Facades\Route;
use Modules\ListRegistration\Http\Controllers\Admin\DashboardController;
use Modules\ListRegistration\Http\Controllers\Admin\ListRegistrationController;
use Modules\ListRegistration\Http\Controllers\Admin\ReportController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('listRegistration', ListRegistrationController::class);

Route::controller(ReportController::class)->prefix('report')->as('report.')->group(function (){
    Route::get('/','index')->name('index');
    Route::post('report-data','report')->name('report-data');
});

Route::prefix('files')->as('files.')->group(function () {
    Route::view('file', 'listregistration::admin.file.file')->name('file');
});
