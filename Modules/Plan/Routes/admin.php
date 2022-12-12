<?php

use Illuminate\Support\Facades\Route;
use Modules\Plan\Http\Controllers\Admin\BudgetHeadController;
use Modules\Plan\Http\Controllers\Admin\BudgetSourceController;
use Modules\Plan\Http\Controllers\Admin\DashboardController;
use Modules\Plan\Http\Controllers\Admin\PlanAreaController;
use Modules\Plan\Http\Controllers\Admin\PlanLevelController;
use Modules\Plan\Http\Controllers\Admin\PlanTemplateController;
use Modules\Plan\Http\Controllers\Admin\ProjectController;
use Modules\Plan\Http\Controllers\Admin\ProjectDocumentController;
use Modules\Plan\Http\Controllers\Admin\ReportController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::post('project/{project}/agreement-term',[ProjectController::class,'saveProjectAgreementTerm'])->name('save-project-agreement-term');
Route::get('project{project}/upload-file',[ProjectController::class,'uploadFilePage'])->name('project.uploadFilePage');
Route::post('project/{project}/upload-file',[ProjectController::class,'uploadFile'])->name('project.uploadFile');
Route::resource('project', ProjectController::class);
Route::resource('project/{project}/projectDocument', ProjectDocumentController::class)->names('project.projectDocument');

Route::prefix('setting')->group(function (){
    Route::get('planSubArea',[PlanAreaController::class,'planSubArea'])->name('planSubArea');
    Route::resource('planArea', PlanAreaController::class)->except('show');
    Route::get('planSubLevel',[PlanLevelController::class,'planSubLevel'])->name('planSubLevel');
    Route::resource('planLevel', PlanLevelController::class)->except('show');
    Route::get('budgetSubHead',[BudgetHeadController::class,'budgetSubHead'])->name('budgetSubHead');
    Route::resource('budgetHead', BudgetHeadController::class)->except('show');
    Route::resource('budgetSource', BudgetSourceController::class)->except('show');
    Route::resource('planTemplate', PlanTemplateController::class)->except('show');
});

//report
Route::controller(ReportController::class)->prefix('report')->as('report.')->group(function (){
    Route::get('/','index')->name('index');
    Route::post('report-data','report')->name('report-data');
});
