<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('grievancehandling')->group(function() {
    Route::get('/', 'GrievanceHandlingController@index');
});
Route::view('/grievance','grievancehandling::frontend.index');
Route::view('/policy','grievancehandling::frontend.policy.policy');
Route::view('/register','grievancehandling::frontend.register.register-form');
Route::view('/track','grievancehandling::frontend.track.track');
