<?php

use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\TraineeTaxClearanceController;
use Modules\Roaster\Http\Controllers\TraineeUserAuthController;
use Modules\Roaster\Http\Controllers\TraineeUserDashboardController;

Route::get('dashboard', TraineeUserDashboardController::class)->name('dashboard');

Route::prefix('profile')->group(function () {
    Route::get('/', [TraineeUserAuthController::class, 'profile'])->name('auth-organization.profile');
});

Route::resource('traineeTaxClearance', TraineeTaxClearanceController::class);
