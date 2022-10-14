<?php

use Illuminate\Support\Facades\Route;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\DashboardController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MunicipalCommitteeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MunicipalMeetingDecisionController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MunicipalMeetingNoticeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\WardCommitteeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\WardMeetingDecisionController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\WardMeetingNoticeController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('municipalCommittee', MunicipalCommitteeController::class);
Route::resource('wardCommittee', WardCommitteeController::class);
Route::prefix('municipal')->group(function () {
    Route::get('municipalMeetingDetails', [MunicipalMeetingNoticeController::class, 'municipalMeetingDetails'])->name('municipalMeetingDetails');
    Route::get('municipalMeetingDetails/report', [MunicipalMeetingNoticeController::class, 'municipalMeetingDetailsReport'])->name('municipalMeetingDetailsReport');
    Route::resource('municipalMeetingNotice', MunicipalMeetingNoticeController::class);
    Route::resource('municipalMeetingDecision', MunicipalMeetingDecisionController::class);
});

Route::prefix('ward')->group(function () {
    Route::get('wardMeetingDetails', [WardMeetingNoticeController::class, 'wardMeetingDetails'])->name('wardMeetingDetails');
    Route::get('wardMeetingDetails/report', [WardMeetingNoticeController::class, 'wardMeetingDetailsReport'])->name('wardMeetingDetailsReport');
    Route::resource('wardMeetingNotice', WardMeetingNoticeController::class);
    Route::resource('wardMeetingDecision', WardMeetingDecisionController::class);
});
