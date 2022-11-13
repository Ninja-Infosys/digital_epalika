<?php

use Illuminate\Support\Facades\Route;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\DashboardController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MeetingDecisionController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MeetingEventController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\MunicipalCommitteeController;
use Modules\ExecutiveMeeting\Http\Controllers\Admin\WardCommitteeController;
use Modules\ExecutiveMeeting\Http\Controllers\CalenderController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::controller(CalenderController::class)
    ->as('calendar.')
    ->prefix('{event_for}')
    ->group(function () {
        Route::get('calendar', 'index')->name('index');
        Route::get('meeting-calendar', 'getData')->name('meetingCalendar');
    });

Route::resource('municipalCommittee', MunicipalCommitteeController::class);
Route::resource('wardCommittee', WardCommitteeController::class);

Route::resource('{event_for}/meetingEvent', MeetingEventController::class)->whereIn('event_for', ['municipal', 'ward']);
Route::get('{event_for}/upcoming-meetings', [MeetingEventController::class, 'upcomingMeetings'])->name('upcomingMeetingEvents')->whereIn('event_for', ['municipal', 'ward']);

Route::resource('{meeting_for}/meetingDecision', MeetingDecisionController::class)->whereIn('meeting_for', ['municipal', 'ward']);
