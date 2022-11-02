<?php


use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\FrontendController;

Route::get('trainer-form',[FrontendController::class,'trainerForm'])->name('trainer-form');


