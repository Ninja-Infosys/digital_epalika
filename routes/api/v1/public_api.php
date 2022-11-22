<?php

use App\Http\Controllers\Api\v1\PublicApiController;

Route::get('/', [PublicApiController::class, 'index'])->name('public-api.index');
Route::get('slider', [PublicApiController::class, 'slider'])->name('public-api.slider');
Route::get('importantLink', [PublicApiController::class, 'importantLink'])->name('public-api.important-link');
Route::get('setting', [PublicApiController::class, 'setting'])->name('public-api.setting');
Route::get('introduction', [PublicApiController::class, 'introduction'])->name('public-api.introduction');
