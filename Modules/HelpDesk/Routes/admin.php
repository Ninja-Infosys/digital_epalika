<?php

use Modules\HelpDesk\Http\Controllers\{BranchController, ServiceController, ServiceEmployeeController};
use Illuminate\Support\Facades\Route;

Route::resource('branch', BranchController::class);
Route::resource('service', ServiceController::class);
Route::resource('service/{service}/serviceEmployee', ServiceEmployeeController::class)->names('service.serviceEmployee');
