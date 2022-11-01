<?php


use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\DashboardController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
