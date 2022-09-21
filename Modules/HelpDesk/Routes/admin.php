<?php

use Modules\HelpDesk\Http\Controllers\{BranchController, ServiceController};

Route::resource('branch', BranchController::class);
Route::resource('service', ServiceController::class);
