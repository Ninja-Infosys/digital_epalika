<?php

use Modules\EMap\Http\Controllers\MapFeeController;
use Modules\EMap\Http\Controllers\MapSettingController;
use Modules\EMap\Http\Controllers\OrganizationController;

Route::get('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

Route::prefix('setting')->group(function () {
    Route::resource('mapSetting', MapSettingController::class)->only('index', 'store');
    Route::resource('mapFee', MapFeeController::class);
});

