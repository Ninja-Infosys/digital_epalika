<?php

use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\DashboardController;
use Modules\Circular\Http\Controllers\DispatchController;
use Modules\Circular\Http\Controllers\RegistrationController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
//report
Route::prefix('report')->group(function () {
    Route::get('registration', [RegistrationController::class, 'registrationReport'])->name('registration.report');
    Route::get('dispatch', [DispatchController::class, 'dispatchReport'])->name('dispatch.report');
});
Route::prefix('files')->as('files.')->group(function () {
    Route::view('registration-file', 'circular::admin.file.registration_file')->name('registration-file');
    Route::view('dispatch-file', 'circular::admin.file.dispatch_file')->name('dispatch-file');
});

Route::resource('registration', RegistrationController::class);
Route::resource('dispatch', DispatchController::class);
