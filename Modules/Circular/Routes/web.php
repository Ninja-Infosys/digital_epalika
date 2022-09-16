<?php


use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\DispatchController;
use Modules\Circular\Http\Controllers\FileDeleteController;
use Modules\Circular\Http\Controllers\RegistrationController;
use Modules\DigitalBoard\Http\Controllers\NewsController;

//registration
Route::get('registration/report',[RegistrationController::class,'registrationReport'])->name('registration.report');
Route::resource('registration', RegistrationController::class);

//dispatch
Route::get('dispatch/report',[DispatchController::class,'dispatchReport'])->name('dispatch.report');
Route::resource('dispatch', DispatchController::class);


//deleteFile
Route::delete('file/{file}',[FileDeleteController::class,'fileDelete'])->name('file.deleteFile');
