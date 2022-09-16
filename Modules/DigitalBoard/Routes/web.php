<?php

use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Http\Controllers\EmployeeController;
use Modules\DigitalBoard\Http\Controllers\NewsController;
use Modules\DigitalBoard\Http\Controllers\NoticeController;
use Modules\DigitalBoard\Http\Controllers\VideoController;

Route::resource('video', VideoController::class);
Route::resource('notice', NoticeController::class);
Route::get('news/{news}/newsUpdate',[NewsController::class,'updateClosedDate'])->name('news.updateClosedDate');
Route::resource('news', NewsController::class);

Route::get('employee/{employee}/updateEmployeeStatus',[EmployeeController::class,'updateEmployeeStatus'])->name('employee.updateEmployeeStatus');
Route::resource('employee', EmployeeController::class);
