<?php

use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Http\Controllers\VideoController;

Route::resource('video', VideoController::class);
