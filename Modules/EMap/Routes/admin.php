<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\DashboardController;
use Modules\EMap\Http\Controllers\Admin\MapController;
use Modules\EMap\Http\Controllers\Admin\OrganizationController;
use Modules\EMap\Http\Controllers\MapFeeController;
use Modules\EMap\Http\Controllers\MapSettingController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

Route::controller(MapController::class)->prefix('map')->as('map.')->group(function () {
    Route::get('mapApply', 'index')->name('mapApply.index');
    Route::get('mapApply/{mapApply}', 'show')->name('mapApply.show');
    Route::put('mapApply/{mapApply}/applyMapApplication/{applyMapApplication}/reject', 'rejectApplication')->name('mapApply.reject');
});
Route::prefix('setting')->group(function () {

    Route::resource('mapSetting', MapSettingController::class)->only('index', 'store');
    Route::resource('mapFee', MapFeeController::class);
});

Route::view('darta', 'emap::admin.darta_fee.darta')->name('darta');
Route::view('officeletter', 'emap::admin.offical_letter.officeletter');
