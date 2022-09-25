<?php


use Illuminate\Support\Facades\Route;
use Modules\BusinessRegistration\Http\Controllers\BusinessNatureController;

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('businessNature', BusinessNatureController::class);
});



