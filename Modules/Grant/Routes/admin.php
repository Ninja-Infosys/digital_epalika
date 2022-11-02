<?php


use Illuminate\Support\Facades\Route;
use Modules\Grant\Http\Controllers\Admin\DashboardController;
use Modules\Grant\Http\Controllers\Admin\GrantTypeController;
use Modules\Grant\Http\Controllers\Admin\InfrastructureController;
use Modules\Grant\Http\Controllers\Admin\ThematicAreaController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->group(function (){
    Route::resource('infrastructure', InfrastructureController::class);
    Route::resource('thematicArea', ThematicAreaController::class);
    Route::resource('grantType', GrantTypeController::class);
});

Route::view('grantDetail','grant::admin.grant_detail.create')->name('grantDetail.create');
