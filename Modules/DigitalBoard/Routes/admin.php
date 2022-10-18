<?php

use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Http\Controllers\Admin\DashboardController;
use Modules\DigitalBoard\Http\Controllers\Admin\EmployeeController;
use Modules\DigitalBoard\Http\Controllers\Admin\NoticeController;
use Modules\DigitalBoard\Http\Controllers\Admin\VideoController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('video', VideoController::class);
Route::resource('{type}/notice', NoticeController::class);
Route::get('{type}/notice/{notice}/noticeUpdate', [NoticeController::class, 'updateClosedDate'])->name('notice.updateClosedDate');
Route::get('{type}/notice/{notice}/updateShowOnIndex', [NoticeController::class, 'updateShowOnIndex'])->name('notice.updateShowOnIndex');


Route::get('employee/{employee}/updateEmployeeStatus', [EmployeeController::class, 'updateEmployeeStatus'])->name('employee.updateEmployeeStatus');
Route::resource('employee', EmployeeController::class);

Route::prefix('files')->as('files.')->group(function (){
    Route::view('notice-file', 'digitalboard::admin.file.news_file')->name('news-file');
    Route::view('news-file', 'digitalboard::admin.file.notice_file')->name('notice-file');
});
