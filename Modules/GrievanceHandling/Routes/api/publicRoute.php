<?php

use Illuminate\Support\Facades\Route;
use Modules\GrievanceHandling\Http\Controllers\Admin\GrievanceApiFormController;

Route::get('grievanceForm', [GrievanceApiFormController::class, 'grievanceForm']);







