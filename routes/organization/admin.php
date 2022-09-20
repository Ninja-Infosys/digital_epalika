<?php

use App\Http\Controllers\OrganizationDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');
