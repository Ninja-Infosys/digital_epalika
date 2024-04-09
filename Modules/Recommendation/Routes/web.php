<?php

use Illuminate\Support\Facades\Route;
use Modules\Recommendation\Http\Controllers\FrontendController;







Route::controller(FrontendController::class)->group(function () {
    Route::get('recommendation', 'recommendation')->name('recommendation.index');
    Route::get('sipharishRegister', 'sipharishRegister')->name('recommendation.register');
    Route::post('sipharishRegisterStore','sipharishRegisterStore')->name('recommendation.register.store');
});