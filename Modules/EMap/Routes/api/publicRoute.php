<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\Api\MapApplyFormApiController;

Route::get("mapApplySetting", [MapApplyFormApiController::class, 'getMapApplySetting'])->name('get-map-apply-setting');
