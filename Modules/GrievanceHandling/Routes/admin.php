<?php


use Illuminate\Support\Facades\Route;
use Modules\GrievanceHandling\Http\Controllers\Setting\{GrievanceTypeController};
use Modules\GrievanceHandling\Http\Controllers\GrievanceDetailController;
use Modules\GrievanceHandling\Http\Controllers\Setting\GrievanceOfficeController;

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('grievanceType', GrievanceTypeController::class);
    Route::resource('grievanceOffice', GrievanceOfficeController::class);
});

Route::resource('grievanceDetail', GrievanceDetailController::class);
