<?php

use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\TraineeApiController;

Route::get('training', [TraineeApiController::class, 'training']);
