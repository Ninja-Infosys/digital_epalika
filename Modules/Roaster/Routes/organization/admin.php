<?php

use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\TraineeUserDashboardController;

Route::get('dashboard', TraineeUserDashboardController::class)->name('dashboard');
