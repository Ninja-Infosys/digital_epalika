<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\DashboardController;
use Modules\EMap\Http\Controllers\Admin\MapController;
use Modules\EMap\Http\Controllers\Admin\MapFeeController;
use Modules\EMap\Http\Controllers\Admin\MapRegistrationController;
use Modules\EMap\Http\Controllers\Admin\OrganizationController;
use Modules\EMap\Http\Controllers\MapSettingController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

Route::resource('map/mapApply/{mapApply}/map-registration', MapRegistrationController::class)->names('map.map-apply.map-registration');

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
Route::view('noticeletter', 'emap::admin.noticeletter.noticeletter');
Route::view('maparreras', 'emap::admin.noticeletter.maparreras');
Route::view('landarreras', 'emap::admin.noticeletter.landarreras');
Route::view('techniciannotice', 'emap::admin.noticeletter.techniciannotice');
Route::view('chaggrement', 'emap::admin.noticeletter.chaggrement');
Route::view('agentaggrement', 'emap::admin.noticeletter.agentaggrement');
Route::view('permissionletter', 'emap::admin.noticeletter.permissionletter');
Route::view('level', 'emap::admin.noticeletter.level');
Route::view('firstphase', 'emap::admin.noticeletter.firstphase');
Route::view('firstphases', 'emap::admin.noticeletter.firstphases');
Route::view('super', 'emap::admin.noticeletter.super');
Route::view('structure', 'emap::admin.tipani.structure');
Route::view('sanso', 'emap::admin.tipani.sanso');
Route::view('superstructure', 'emap::admin.tipani.superstructure');
Route::view('sanpermission', 'emap::admin.tipani.sanpermission');
Route::view('estd', 'emap::admin.tipani.estd');
Route::view('second', 'emap::admin.tipani.second');
Route::view('secondphase', 'emap::admin.tipani.secondphase');
