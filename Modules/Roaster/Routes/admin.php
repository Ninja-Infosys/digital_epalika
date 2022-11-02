<?php


use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\DashboardController;
use Modules\Roaster\Http\Controllers\Setting\DepartmentController;
use Modules\Roaster\Http\Controllers\Setting\DesignationController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('department', DepartmentController::class);
    Route::resource('designation',DesignationController::class);
});
