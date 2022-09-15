<?php


use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\RegistrationController;

Route::resource('registration', RegistrationController::class);
