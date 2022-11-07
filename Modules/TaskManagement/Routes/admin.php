<?php

use Illuminate\Support\Facades\Route;
use Modules\TaskManagement\Http\Controllers\Admin\TaskCategoryController;
use Modules\TaskManagement\Http\Controllers\Admin\DashboardController;
use Modules\TaskManagement\Http\Controllers\Admin\TaskDivisionController;
use Modules\TaskManagement\Http\Controllers\Admin\TaskController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('task', TaskController::class);

Route::prefix('setting')->group(function (){
    Route::resource('taskCategory', TaskCategoryController::class);
    Route::resource('subCategory', TaskDivisionController::class);
});
