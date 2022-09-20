<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\OrganizationDashboardController;


Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');
