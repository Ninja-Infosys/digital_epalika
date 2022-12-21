<?php


use Modules\BusinessRegistration\Http\Controllers\Api\v1\ReportController;

Route::controller(ReportController::class)->prefix('reports')->as('report.')->group(function () {
    Route::get('get-required-data', 'getRequiredData');
    Route::post('report-data', 'report');
});
