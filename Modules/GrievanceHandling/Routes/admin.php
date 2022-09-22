<?php


use Modules\GrievanceHandling\Http\Controllers\Setting\{GrievanceTypeController};
use Illuminate\Support\Facades\Route;
use Modules\GrievanceHandling\Http\Controllers\GrievanceOfficeController;

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('grievanceType', GrievanceTypeController::class);
    Route::resource('grievanceOffice', GrievanceOfficeController::class);
});
