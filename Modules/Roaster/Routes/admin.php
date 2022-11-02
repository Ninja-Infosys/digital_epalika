<?php


use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\DashboardController;
use Modules\Roaster\Http\Controllers\Setting\DepartmentController;
use Modules\Roaster\Http\Controllers\Setting\DesignationController;
use Modules\Roaster\Http\Controllers\Setting\SubjectController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('department', DepartmentController::class);
    Route::resource('designation',DesignationController::class);
    Route::resource('subject', SubjectController::class);
});
