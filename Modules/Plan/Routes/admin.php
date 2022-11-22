<?php

use Illuminate\Support\Facades\Route;
use Modules\Plan\Http\Controllers\Admin\DashboardController;
use Modules\Plan\Http\Controllers\Admin\PlanAreaController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->group(function (){
    Route::resource('planArea', PlanAreaController::class);
});
