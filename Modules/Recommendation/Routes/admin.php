<?php

use Modules\Recommendation\Http\Controllers\Admin\DashboardController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
