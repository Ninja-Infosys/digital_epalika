<?php

use Modules\Revenue\Http\Controllers\Admin\DashboardController;
use Modules\Revenue\Http\Controllers\Admin\RevenueCategoryController;
use Modules\Revenue\Http\Controllers\Admin\RevenueController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('revenue-category', RevenueCategoryController::class)->except('show');

    Route::get('revenue/{revenue}/update-status', [RevenueController::class, 'updateStatus'])->name('revenue.update-status');
    Route::resource('revenue', RevenueController::class);
});
