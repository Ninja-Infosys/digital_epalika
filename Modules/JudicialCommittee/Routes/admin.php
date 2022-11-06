<?php

use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Http\Controllers\Admin\ChiefJudicialMemberController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DashboardController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('chiefJudicialMember/{chiefJudicialMember}/updateStatus', [ChiefJudicialMemberController::class,'updateStatus'])->name('chiefJudicialMember.updateStatus');
Route::resource('chiefJudicialMember',ChiefJudicialMemberController::class);


//static routes
Route::view('application-form','judicialcommittee::admin.static.application_form')->name('applicationForm');
