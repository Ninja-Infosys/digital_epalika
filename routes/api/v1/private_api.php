<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\v1\PublicApiController;
use Illuminate\Support\Facades\Route;


Route::get('mobile/profile', [AuthController::class, 'profile']);
// Route::patch('mobile/update', [AuthController::class, 'updateUserProfile'])->name('updateUser');
