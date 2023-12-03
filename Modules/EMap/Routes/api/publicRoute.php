<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\Api\MapApplyFormApiController;
use Modules\EMap\Http\Controllers\Admin\Api\OrganizationApiController;

    Route::apiResource("mapApply",MapApplyFormApiController::class);
