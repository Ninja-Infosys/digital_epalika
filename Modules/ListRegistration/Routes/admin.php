<?php

use Illuminate\Support\Facades\Route;
use Modules\ListRegistration\Http\Controllers\Admin\ListRegistrationController;

Route::resource('listRegistration', ListRegistrationController::class);
