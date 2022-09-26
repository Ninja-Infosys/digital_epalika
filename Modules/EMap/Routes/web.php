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


use Modules\EMap\Http\Controllers\OrganizationAuthController;

Route::prefix('organization')->as('organization.')->group(function () {
    Route::get('login', [OrganizationAuthController::class, 'showOrganizationLoginForm'])->name('login.form');
    Route::post('login', [OrganizationAuthController::class, 'organizationLogin'])->name('login');
    Route::get('register', [OrganizationAuthController::class, 'showOrganizationRegisterForm'])->name('register.form');
    Route::get('logout', [OrganizationAuthController::class, 'logout'])->name('logout');
    Route::get('{organization}/invitation', [OrganizationAuthController::class, 'invitation'])->name('invitation');
    Route::view('dashboard', 'emap::organization.dashboard');
    Route::get('/password/create', [OrganizationAuthController::class, 'create'])->name('password.create')->middleware([  'password.check']);
    Route::post('/password/store', [OrganizationAuthController::class, 'store'])->name('password.store')->middleware(['password.check']);
});
Route::view('/e-map', 'emap::frontend.e-map.index')->name('e-map');
Route::view('/downloads', 'emap::frontend.e-map.downloads.downloads');
Route::view('/e-help', 'emap::frontend.e-map.e-help.e-help');
Route::view('/notice', 'emap::frontend.e-map.notice.notice');
Route::view('/register', 'emap::frontend.e-map.register.register-form');
Route::view('/track', 'emap::frontend.e-map.track.track');

