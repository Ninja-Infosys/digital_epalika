<?php

use Illuminate\Support\Facades\Route;
use Modules\Plan\Http\Controllers\Admin\BudgetHeadController;
use Modules\Plan\Http\Controllers\Admin\BudgetSourceController;
use Modules\Plan\Http\Controllers\Admin\DashboardController;
use Modules\Plan\Http\Controllers\Admin\PlanAreaController;
use Modules\Plan\Http\Controllers\Admin\PlanLevelController;
use Modules\Plan\Http\Controllers\Admin\ProjectController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('project', ProjectController::class);

Route::prefix('setting')->group(function (){
    Route::resource('planArea', PlanAreaController::class)->except('show');
    Route::resource('planLevel', PlanLevelController::class)->except('show');
    Route::resource('budgetHead', BudgetHeadController::class)->except('show');
    Route::resource('budgetSource', BudgetSourceController::class)->except('show');
});
