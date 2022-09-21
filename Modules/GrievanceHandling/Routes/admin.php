<?php


use Modules\GrievanceHandling\Http\Controllers\Setting\{GrievanceTypeController};

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('grievanceType', GrievanceTypeController::class);
});
