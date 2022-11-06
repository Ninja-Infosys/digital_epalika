<?php

use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Http\Controllers\Admin\DashboardController;

Route::get('dashboard', DashboardController::class)->name('dashboard');


//static routes
Route::view('application-form','judicialcommittee::admin.static.application_form')->name('applicationForm');
