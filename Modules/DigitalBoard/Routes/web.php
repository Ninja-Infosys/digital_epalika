<?php

use Illuminate\Support\Facades\Route;
use Modules\DigitalBoard\Http\Controllers\NoticeController;
use Modules\DigitalBoard\Http\Controllers\VideoController;

Route::resource('video', VideoController::class);
Route::resource('notice', NoticeController::class);
