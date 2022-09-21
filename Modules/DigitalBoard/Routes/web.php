<?php

use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Http\Controllers\EmployeeController;
use Modules\DigitalBoard\Http\Controllers\NewsController;
use Modules\DigitalBoard\Http\Controllers\NoticeController;
use Modules\DigitalBoard\Http\Controllers\VideoController;

Route::resource('video', VideoController::class);
Route::resource('{type}/notice', NoticeController::class);
Route::get('{type}/notice/{notice}/noticeUpdate',[NoticeController::class,'updateClosedDate'])->name('notice.updateClosedDate');
Route::get('{type}/notice/{notice}/updateShowOnIndex',[NoticeController::class,'updateShowOnIndex'])->name('notice.updateShowOnIndex');


Route::get('employee/{employee}/updateEmployeeStatus',[EmployeeController::class,'updateEmployeeStatus'])->name('employee.updateEmployeeStatus');
Route::resource('employee', EmployeeController::class);
