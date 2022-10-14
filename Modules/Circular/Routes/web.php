<?php


use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\DashboardController;
use Modules\Circular\Http\Controllers\DispatchController;
use Modules\Circular\Http\Controllers\RegistrationController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
//report
Route::prefix('report')->group(function (){
    Route::get('registration', [RegistrationController::class, 'registrationReport'])->name('registration.report');
    Route::get('dispatch', [DispatchController::class, 'dispatchReport'])->name('dispatch.report');
});

Route::resource('registration', RegistrationController::class);
Route::resource('dispatch', DispatchController::class);



