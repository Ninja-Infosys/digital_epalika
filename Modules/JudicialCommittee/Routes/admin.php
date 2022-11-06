<?php

use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Http\Controllers\Admin\DashboardController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialMemberController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('judicialMember', JudicialMemberController::class);


//static routes
Route::view('application-form','judicialcommittee::admin.static.application_form')->name('applicationForm');
