<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\Api\OrganizationApiController;

// Route::get("form-setting-data",[OrganizationApiController::class,"index"])->name("form-setting-data");
Route::apiResource("form-setting-data",OrganizationApiController::class);
