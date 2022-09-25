<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\OrganizationAuthController;

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
Route::get('/static/category', function () {
    return view('frontend.static.category.category');
});
Route::get('/static/category', function () {
    return view('frontend.static.category.index');
});
Route::view('/static/contact', 'frontend.static.contact.index')->name('contact');
Route::get('/static/representative', function () {
    return view('frontend.static.representive.representive');
});
Route::get('/static/gallery/audio', function () {
    return view('frontend.static.gallery.audio.index');
});
Route::get('/static/gallery/photo', function () {
    return view('frontend.static.gallery.photo.index');
});
Route::get('/static/gallery/photo', function () {
    return view('frontend.static.gallery.photo.single-photo');
});
Route::get('/static/gallery/video', function () {
    return view('frontend.static.gallery.video.index');
});
Route::get('/static/representative', function () {
    return view('frontend.static.representative.index');
});
Route::get('/static/employee', function () {
    return view('frontend.static.employee.index');
});

Route::get('/static/photo', function () {
    return view('frontend.static.gallery.photo.photo');
});
Route::get('/static/audio', function () {
    return view('frontend.static.gallery.audio.audio');
});
Route::get('/static/video', function () {
    return view('frontend.static.gallery.video.video');
});
Route::get('/static/employee', function () {
    return view('frontend.static.employee.employee');
});
Route::get('/static/representive', function () {
    return view('frontend.static.representive.representive');
});
Route::get('/static/gallery/photo/single-photo', function () {
    return view('frontend.static.gallery.photo.single-photo.single-photo');
});
Route::get('/static/notice', [FrontController::class,'notice'])->name('notice');
Route::get('/static/single-notice/{notice}', [FrontController::class,'singleNotice'])->name('single-notice');
Route::get('/static/executive', function () {
    return view('frontend.static.executive-board.index');
});
Route::get('/static/single-executive', function () {
    return view('frontend.static.executive-board.single-executive-board');
});
Route::get('/popup', function () {
    return view('frontend.partials.popup');
});



