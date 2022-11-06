<?php

use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Http\Controllers\Admin\DashboardController;

Route::get('dashboard', DashboardController::class)->name('dashboard');


//static routes
Route::view('application-form','judicialcommittee::admin.static.application_form')->name('applicationForm');
Route::view('nissa-form','judicialcommittee::admin.static.nissa_form')->name('nissaForm');
Route::view('defendant_continued_time','judicialcommittee::admin.static.defendant_continued_time')->name('defendantContinuedTime');
Route::view('stay_date_form','judicialcommittee::admin.static.stay_date_form')->name('stayDateForm');
