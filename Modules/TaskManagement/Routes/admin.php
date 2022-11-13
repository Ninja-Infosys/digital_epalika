<?php

use Illuminate\Support\Facades\Route;
use Modules\TaskManagement\Http\Controllers\Admin\DailyTaskController;
use Modules\TaskManagement\Http\Controllers\Admin\DashboardController;
use Modules\TaskManagement\Http\Controllers\Admin\ReportController;
use Modules\TaskManagement\Http\Controllers\Admin\TaskCategoryController;
use Modules\TaskManagement\Http\Controllers\Admin\TaskDivisionController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('dailyTask', DailyTaskController::class);

Route::prefix('report')->as('report.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
});

Route::prefix('setting')->group(function () {
    Route::resource('taskCategory', TaskCategoryController::class);
    Route::resource('taskDivision', TaskDivisionController::class);
});
