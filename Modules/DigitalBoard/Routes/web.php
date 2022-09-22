<?php


use Illuminate\Support\Facades\Route;

Route::view('/digitalboard', 'digitalboard::frontend.index');
Route::view('/service', 'digitalboard::frontend.services.service');

