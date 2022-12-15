<?php
use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\Admin\DashboardController;
use Modules\Circular\Http\Controllers\Admin\DispatchController;
use Modules\Circular\Http\Controllers\Admin\DispatchReportController;
use Modules\Circular\Http\Controllers\Admin\RegistrationController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
//report
Route::prefix('report')->group(function () {
    Route::get('registration', [RegistrationController::class, 'registrationReport'])->name('registration.report');
});
Route::prefix('files')->as('files.')->group(function () {
    Route::view('registration-file', 'circular::admin.file.registration_file')->name('registration-file');
    Route::view('dispatch-file', 'circular::admin.file.dispatch_file')->name('dispatch-file');
});

Route::resource('registration', RegistrationController::class);
Route::resource('dispatch', DispatchController::class);

//dispatch report
Route::controller(DispatchReportController::class)->prefix('report/dispatch')->as('report.dispatch.')->group(function (){
    Route::get('/','index')->name('index');
    Route::post('report-data','report')->name('report-data');
});
