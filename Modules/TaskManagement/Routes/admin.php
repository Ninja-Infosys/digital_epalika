<?php

use Illuminate\Support\Facades\Route;
use Modules\TaskManagement\Http\Controllers\Admin\CategoryController;
use Modules\TaskManagement\Http\Controllers\Admin\DashboardController;
use Modules\TaskManagement\Http\Controllers\Admin\SubCategoryController;
use Modules\TaskManagement\Http\Controllers\Admin\TaskController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('task', TaskController::class);
Route::resource('mainCategory', CategoryController::class);
Route::resource('subCategory', SubCategoryController::class);
