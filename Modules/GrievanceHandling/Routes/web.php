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


use Illuminate\Support\Facades\Route;
use Modules\GrievanceHandling\Http\Controllers\Frontend\FrontendController;

Route::view('/grievance','grievancehandling::frontend.index')->name('grievance');
Route::view('/policy','grievancehandling::frontend.policy.policy')->name('policy');
Route::view('grievance-register','grievancehandling::frontend.register.register-form')->name('grievance-register');
Route::view('/track','grievancehandling::frontend.track.track')->name('track');
Route::view('/public-grievance','grievancehandling::frontend.grievance-public.public-grievance')->name('public-grievance');
Route::view('/grievance-list','grievancehandling::frontend.grievance.grievance-list')->name('grievance-list');
Route::get('single-grievance',[FrontendController::class,'singleGrievance'])->name('single-grievance');
