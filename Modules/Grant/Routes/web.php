<?php
use Illuminate\Support\Facades\Route;
use Modules\Grant\Http\Controllers\FrontendController;

Route::controller(FrontendController::class)->group(function (){
    Route::get('application-registration','applicationRegistration')->name('applicationRegistration');
});
