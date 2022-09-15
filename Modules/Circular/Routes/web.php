<?php


use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\DispatchController;
use Modules\Circular\Http\Controllers\FileDeleteController;
use Modules\Circular\Http\Controllers\RegistrationController;

Route::get('registration/report',[RegistrationController::class,'registrationReport'])->name('registration.report');
Route::resource('registration', RegistrationController::class);

Route::resource('dispatch', DispatchController::class);
//deleteFile
Route::delete('file/{file}',[FileDeleteController::class,'fileDelete'])->name('file.deleteFile');
