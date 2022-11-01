<?php

use Illuminate\Support\Facades\Route;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\DashboardController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MeetingEventController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MunicipalCommitteeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MunicipalMeetingDecisionController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\WardCommitteeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\WardMeetingDecisionController;
use Modules\ExecutiveMeeting\Http\Controllers\CalenderController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::get('calender', [CalenderController::class, 'index'])->name('calender.index');
Route::get('meeting-calendar', [CalenderController::class, 'getData'])->name('meetingCalendar');

Route::resource('{event_for}/meetingEvent', MeetingEventController::class)->whereIn('event_for', ['municipal', 'ward']);
Route::get('{event_for}/upcoming-meetings', [MeetingEventController::class, 'upcomingMeetings'])->name('upcomingMeetingEvents')->whereIn('event_for', ['municipal', 'ward']);

Route::resource('municipalCommittee', MunicipalCommitteeController::class);
Route::resource('wardCommittee', WardCommitteeController::class);
Route::prefix('municipal')->group(function () {
    Route::resource('municipalMeetingDecision', MunicipalMeetingDecisionController::class);
});

Route::prefix('ward')->group(function () {
    Route::resource('wardMeetingDecision', WardMeetingDecisionController::class);
});
