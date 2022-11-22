<?php

use Illuminate\Support\Facades\Route;
use Modules\Plan\Http\Controllers\Admin\DashboardController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
