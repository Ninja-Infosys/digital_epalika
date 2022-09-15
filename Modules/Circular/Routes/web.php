<?php


use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\DispatchController;
use Modules\Circular\Http\Controllers\FileDeleteController;
use Modules\Circular\Http\Controllers\RegistrationController;

Route::resource('registration', RegistrationController::class);

Route::resource('dispatch', DispatchController::class);

Route::delete('file/{file}',[FileDeleteController::class,'fileDelete'])->name('file.deleteFile');
