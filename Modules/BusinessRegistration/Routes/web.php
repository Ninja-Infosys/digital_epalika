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
use Modules\BusinessRegistration\Http\Controllers\Frontend\FrontendController;


//frontendController
Route::get('businessRegistration',[FrontendController::class,'businessRegistration'])->name('businessRegistration');

Route::view('business-register','businessRegistration::frontend.register.register')->name('business-register');
