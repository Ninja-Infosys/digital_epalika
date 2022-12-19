<?php

use Illuminate\Support\Facades\Route;
use Modules\Grant\Http\Controllers\Admin\DashboardController;
use Modules\Grant\Http\Controllers\Admin\Setting\EnterpriseTypeController;
use Modules\Grant\Http\Controllers\Admin\Setting\GrantTypeController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('grantType', GrantTypeController::class);
    Route::resource('enterpriseType', EnterpriseTypeController::class);
});

