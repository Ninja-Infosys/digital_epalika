<?php

use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\Admin\Api\PublicApiController;
use Modules\Roaster\Http\Controllers\Admin\Api\TrainingApiController;

Route::get('training', [TrainingApiController::class, 'index']);
