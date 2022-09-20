<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\OrganizationAuthController;
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

Route::get('/', function () {
    return redirect(route('admin.dashboard'));
});


Route::prefix('organization')->as('organization.')->group(function () {
    Route::get('login', [OrganizationAuthController::class, 'showOrganizationLoginForm'])->name('login.form');
    Route::post('login', [OrganizationAuthController::class, 'organizationLogin'])->name('login');

    Route::get('register', [OrganizationAuthController::class, 'showOrganizationRegisterForm'])->name('register.form');
    Route::post('register', [OrganizationAuthController::class, 'registerOrganization'])->name('register');

});

