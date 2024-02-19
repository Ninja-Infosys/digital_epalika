<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\Api\MapApplyFormApiController;
use Modules\EMap\Http\Controllers\Api\MapApplicationController;

Route::get("mapApplySetting", [MapApplyFormApiController::class, 'getMapApplySetting'])->name('get-map-apply-setting');

//register map application from frontend
Route::post('map-application', [MapApplicationController::class,'registerApplication'])->name('register-application');
