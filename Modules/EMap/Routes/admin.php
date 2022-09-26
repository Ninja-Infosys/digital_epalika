<?php

use Modules\EMap\Http\Controllers\MapSettingController;
use Modules\EMap\Http\Controllers\OrganizationController;

Route::get('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

Route::resource('setting', MapSettingController::class)->only('index', 'store');
