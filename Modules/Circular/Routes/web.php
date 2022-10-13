<?php


use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\DashboardController;
use Modules\Circular\Http\Controllers\DispatchController;
use Modules\Circular\Http\Controllers\RegistrationController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
//registration
Route::get('registration/report', [RegistrationController::class, 'registrationReport'])->name('registration.report');
Route::resource('registration', RegistrationController::class);

//dispatch
Route::get('dispatch/report', [DispatchController::class, 'dispatchReport'])->name('dispatch.report');
Route::resource('dispatch', DispatchController::class);



