<?php

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
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/static/category', function(){
    return view('frontend.static.category.category');
});

Route::get('/static/photo', function(){
    return view('frontend.static.gallery.photo.photo');
});
Route::get('/static/audio', function(){
    return view('frontend.static.gallery.audio.audio');
});
Route::get('/static/video', function(){
    return view('frontend.static.gallery.video.video');
});
Route::get('/static/employee', function(){
    return view('frontend.static.employee.employee');
});
Route::get('/static/representive', function(){
    return view('frontend.static.representive.representive');
});
