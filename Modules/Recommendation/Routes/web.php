<?php

use Illuminate\Support\Facades\Route;
use Modules\Recommendation\Http\Controllers\FrontendController;







Route::controller(FrontendController::class)->group(function () {
    Route::get('recommendation', 'recommendation')->name('recommendation.index');
    Route::get('sipharishRegister', 'sipharishRegister')->name('recommendation.register');
    Route::post('sipharishRegisterStore','sipharishRegisterStore')->name('recommendation.register.store');
    Route::get('sipharishList','sipharishList')->name('recommendation.sipharishList');
    Route::Put('destroySipharish/{recommendationCreate}','destroySipharish')->name('recommendation.destroySipharish');
    Route::get('recommendationListshow','recommendationListshow')->name('recommendation.recommendationListshow');
});