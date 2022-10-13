<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\PrintController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return redirect(route('admin.dashboard'));
//});
Route::get('/', [FrontController::class, 'index'])->name('welcome');
Route::get('introduction', [FrontController::class, 'introduction'])->name('introduction');
Route::get('category', [FrontController::class, 'category'])->name('category');
Route::get('contact', [FrontController::class, 'contact'])->name('contact');
Route::get('representative', [FrontController::class, 'representative'])->name('representative');
Route::get('audio', [FrontController::class, 'audio'])->name('audio');
Route::get('photo', [FrontController::class, 'photo'])->name('photo');
Route::get('single-photo', [FrontController::class, 'single_photo'])->name('single-photo');
Route::get('video', [FrontController::class, 'video'])->name('video');
Route::get('employee', [FrontController::class, 'employee'])->name('employee');
Route::get('executive', [FrontController::class, 'executive'])->name('executive');
Route::get('single-executive', [FrontController::class, 'single_executive'])->name('single-executive');
Route::get('service-details', [FrontController::class, 'service_details'])->name('service-details');


Route::get('/static/notice', [FrontController::class, 'notice'])->name('notice');
Route::get('/static/single-notice/{notice}', [FrontController::class, 'singleNotice'])->name('single-notice');

Route::prefix('print')->as('print.')->controller(PrintController::class)->group(function () {
    Route::post('applicationPrint', 'applicationPrint')->name('application-print');
    Route::post('officeLetterPrint', 'officeLetterPrint')->name('office-letter-print');
    Route::post('businessRegistrationPrint','businessRegistrationPrint')->name('business-registration-print');
});



