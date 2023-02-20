<?php

use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Http\Controllers\Admin\ServiceController;
use Modules\DigitalBoard\Http\Controllers\Admin\ServiceEmployeeController;
use Modules\HelpDesk\Http\Controllers\Admin\DashboardController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

