<?php

use Illuminate\Support\Facades\Route;
use Modules\ListRegistration\Http\Controllers\Admin\DashboardController;
use Modules\ListRegistration\Http\Controllers\Admin\ListRegistrationController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('listRegistration', ListRegistrationController::class);

Route::prefix('files')->as('files.')->group(function (){
    Route::view('application-file', 'listregistration::admin.file.application_file')->name('application-file');
    Route::view('notice', 'listregistration::admin.file.notice')->name('notice');
    Route::view('application', 'listregistration::admin.file.application')->name('application');
    Route::view('darta', 'listregistration::admin.file.darta')->name('darta');
    Route::view('temporary', 'listregistration::admin.file.temporary')->name('temporary');
    Route::view('taxclearance', 'listregistration::admin.file.taxclearance')->name('taxclearance');
    Route::view('permission', 'listregistration::admin.file.permission')->name('permission');
});

