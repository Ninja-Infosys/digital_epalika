<?php

use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Http\Controllers\EmployeeController;
use Modules\DigitalBoard\Http\Controllers\NewsController;
use Modules\DigitalBoard\Http\Controllers\NoticeController;
use Modules\DigitalBoard\Http\Controllers\VideoController;

Route::resource('video', VideoController::class);
Route::resource('notice', NoticeController::class);
Route::resource('news', NewsController::class);
Route::resource('employee', EmployeeController::class);
