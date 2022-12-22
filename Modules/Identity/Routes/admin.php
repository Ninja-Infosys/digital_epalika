<?php

use Modules\Identity\Http\Controllers\DashboardController;
use Modules\Identity\Http\Controllers\DisabilityReasonController;
use Modules\Identity\Http\Controllers\DisabilityTypeController;
use Modules\Identity\Http\Controllers\RelationshipController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('relationship', RelationshipController::class);
    Route::resource('disabilityReason', DisabilityReasonController::class);
    Route::resource('disabilityType', DisabilityTypeController::class);
});
