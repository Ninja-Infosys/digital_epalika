<?php

use Illuminate\Support\Facades\Route;
use Modules\Recommendation\Http\Controllers\FrontendController;






  
Route::controller(FrontendController::class)->group(function () {
    Route::resource('recommendation', 'index');
    });  