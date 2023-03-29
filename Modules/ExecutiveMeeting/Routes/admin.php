<?php

use Illuminate\Support\Facades\Route;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\CalenderController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\CommitteeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\CommitteeMemberController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\CommitteeTypeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\DashboardController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MeetingController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MeetingDecisionController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MeetingEventController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\ReportController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('committeeType', CommitteeTypeController::class);
    Route::resource('committee', CommitteeController::class);
});

Route::controller(CalenderController::class)
    ->as('calendar.')
    ->group(function () {
        Route::get('calendar', 'index')->name('index');
        Route::get('meeting-calendar', 'getData')->name('meetingCalendar');
    });

Route::resource('committeeMember', CommitteeMemberController::class);
Route::resource('meeting', MeetingController::class);

Route::resource('{event_for}/meetingEvent', MeetingEventController::class)->whereIn('event_for', ['municipal', 'ward']);
Route::get('{event_for}/upcoming-meetings', [MeetingEventController::class, 'upcomingMeetings'])->name('upcomingMeetingEvents')->whereIn('event_for', ['municipal', 'ward']);

Route::resource('meetingDecision', MeetingDecisionController::class);

Route::controller(ReportController::class)->prefix('reports')->as('report.')->group(function () {
    Route::get('/','index')->name('index');
    Route::post('report-data','report')->name('report-data');
});
