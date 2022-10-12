<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\MapController;
use Modules\EMap\Http\Controllers\MapFeeController;
use Modules\EMap\Http\Controllers\MapSettingController;
use Modules\EMap\Http\Controllers\OrganizationController;

Route::get('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

Route::controller(MapController::class)->prefix('map')->as('map.')->group(function () {
    Route::get('/', 'index')->name('index');
});
Route::prefix('setting')->group(function () {

    Route::resource('mapSetting', MapSettingController::class)->only('index', 'store');
    Route::resource('mapFee', MapFeeController::class);
});

Route::view('darta', 'emap::admin.darta_fee.darta')->name('darta');
