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
Route::get('/e-map', function () {
    return view('frontend.e-map.index');
});
Route::get('/downloads', function () {
    return view('frontend.e-map.downloads');
});


