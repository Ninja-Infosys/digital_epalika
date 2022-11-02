<?php


use Modules\Grant\Http\Controllers\Admin\DashboardController;
use Modules\Grant\Http\Controllers\Admin\InfrastructureController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->group(function (){
    Route::resource('infrastructure', InfrastructureController::class);
});

Route::view('grantDetail','grant::admin.grant_detail.create')->name('grantDetail.create');
