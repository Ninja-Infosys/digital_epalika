<?php

use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Http\Controllers\Admin\AdministrationMemberController;
use Modules\JudicialCommittee\Http\Controllers\Admin\ChiefJudicialMemberController;
use Modules\JudicialCommittee\Http\Controllers\Admin\ComplaintApplicationController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DashboardController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialMemberController;
use Modules\JudicialCommittee\Http\Controllers\Admin\LawsuitNatureController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('chiefJudicialMember/{chiefJudicialMember}/updateStatus', [ChiefJudicialMemberController::class, 'updateStatus'])->name('chiefJudicialMember.updateStatus');
Route::resource('chiefJudicialMember', ChiefJudicialMemberController::class);

Route::get('judicialMember/{judicialMember}/updateStatus', [JudicialMemberController::class, 'updateStatus'])->name('judicialMember.updateStatus');
Route::resource('judicialMember', JudicialMemberController::class);

Route::get('administrationMember/{administrationMember}/updateStatus', [AdministrationMemberController::class, 'updateStatus'])->name('administrationMember.updateStatus');
Route::resource('administrationMember', AdministrationMemberController::class);

Route::resource('complaintApplication', ComplaintApplicationController::class);

Route::prefix('setting')->group(function () {
    Route::resource('lawsuitNature', LawsuitNatureController::class);
});

//static routes
Route::view('application-form', 'judicialcommittee::admin.static.application_form')->name('applicationForm');
Route::view('nissa-form', 'judicialcommittee::admin.static.nissa_form')->name('nissaForm');
Route::view('defendant_continued_time', 'judicialcommittee::admin.static.defendant_continued_time')->name('defendantContinuedTime');
Route::view('stay_date_form', 'judicialcommittee::admin.static.stay_date_form')->name('stayDateForm');
Route::view('stay_date_compensation', 'judicialcommittee::admin.static.stay_date_compensation')->name('stayDateCompensation');
