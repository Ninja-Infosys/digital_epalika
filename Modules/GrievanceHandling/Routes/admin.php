<?php


use Illuminate\Support\Facades\Route;
use Modules\GrievanceHandling\Http\Controllers\Admin\DashboardController;
use Modules\GrievanceHandling\Http\Controllers\Admin\GrievanceDetailController;
use Modules\GrievanceHandling\Http\Controllers\Admin\GrievanceUserController;
use Modules\GrievanceHandling\Http\Controllers\Admin\Setting\{GrievanceTypeController};
use Modules\GrievanceHandling\Http\Controllers\Admin\Setting\GrievanceOfficeController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('grievanceType', GrievanceTypeController::class);
    Route::resource('grievanceOffice', GrievanceOfficeController::class);
});

Route::resource('grievanceDetail', GrievanceDetailController::class);
Route::post('grievanceDetail/{grievanceDetail}/replayGrievance', [GrievanceDetailController::class, 'replayGrievance'])->name('grievanceDetail.replyGrievance');
Route::put('grievanceDetail/{grievanceDetail}/UpdateStatus', [GrievanceDetailController::class, 'updateStatus'])->name('grievanceDetail.updateStatus');
Route::resource('grievanceUser', GrievanceUserController::class)->only('index');
