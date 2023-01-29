<?php

use Illuminate\Support\Facades\Route;
use Modules\Plan\Http\Controllers\Admin\ConsumerCommitteeController;
use Modules\Plan\Http\Controllers\Admin\ConsumerCommitteeTransactionController;
use Modules\Plan\Http\Controllers\Admin\DashboardController;
use Modules\Plan\Http\Controllers\Admin\ProjectAgreementTermController;
use Modules\Plan\Http\Controllers\Admin\ProjectBidDetailController;
use Modules\Plan\Http\Controllers\Admin\ProjectBidSubmissionController;
use Modules\Plan\Http\Controllers\Admin\ProjectController;
use Modules\Plan\Http\Controllers\Admin\ProjectCostDetailController;
use Modules\Plan\Http\Controllers\Admin\ProjectDocumentController;
use Modules\Plan\Http\Controllers\Admin\ProjectMaintenanceArrangementController;
use Modules\Plan\Http\Controllers\Admin\ReportController;
use Modules\Plan\Http\Controllers\Admin\Setting\BudgetHeadController;
use Modules\Plan\Http\Controllers\Admin\Setting\BudgetSourceController;
use Modules\Plan\Http\Controllers\Admin\Setting\ExpenseHeadController;
use Modules\Plan\Http\Controllers\Admin\Setting\GrantCategoryController;
use Modules\Plan\Http\Controllers\Admin\Setting\PlanAreaController;
use Modules\Plan\Http\Controllers\Admin\Setting\PlanLevelController;
use Modules\Plan\Http\Controllers\Admin\Setting\PlanTemplateController;
use Modules\Plan\Http\Controllers\Admin\TechnicalCostEstimateController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('project/{project}/file-list', [ProjectController::class, 'fileList'])->name('project.fileList');
Route::get('project{project}/upload-file', [ProjectController::class, 'uploadFilePage'])->name('project.uploadFilePage');
Route::post('project/{project}/upload-file', [ProjectController::class, 'uploadFile'])->name('project.uploadFile');
Route::get('project/{project}/{planTemplateTypeEnum}/print',[ProjectController::class,'print'])->name('project.print');
Route::resource('project', ProjectController::class);
Route::resource('project/{project}/projectCostDetail', ProjectCostDetailController::class)->names('project.projectCostDetail')->only('index');
Route::resource('project/{project}/projectDocument', ProjectDocumentController::class)->names('project.projectDocument');
Route::resource('project/{project}/projectBidDetail', ProjectBidDetailController::class)->names('project.projectBidDetail');
Route::resource('project/{project}/consumerCommittee', ConsumerCommitteeController::class)->names('project.consumerCommittee');
Route::resource('project/{project}/projectAgreementTerm', ProjectAgreementTermController::class)->names('project.projectAgreementTerm');
Route::resource('project/{project}/projectBidSubmission', ProjectBidSubmissionController::class)->names('project.projectBidSubmission');
Route::resource('project/{project}/consumerCommitteeTransaction', ConsumerCommitteeTransactionController::class)->names('project.consumerCommitteeTransaction');
Route::resource('project/{project}/projectMaintenanceArrangement', ProjectMaintenanceArrangementController::class)->names('project.projectMaintenanceArrangement');
Route::resource('project/{project}/technicalCostEstimate', TechnicalCostEstimateController::class)->names('project.technicalCostEstimate');

Route::prefix('setting')->group(function () {
    Route::get('planSubArea', [PlanAreaController::class, 'planSubArea'])->name('planSubArea');
    Route::resource('{type}/planArea', PlanAreaController::class)->except('show');
    Route::get('planSubLevel', [PlanLevelController::class, 'planSubLevel'])->name('planSubLevel');
    Route::resource('planLevel', PlanLevelController::class)->except('show');
    Route::get('budgetSubHead', [BudgetHeadController::class, 'budgetSubHead'])->name('budgetSubHead');
    Route::resource('budgetHead', BudgetHeadController::class)->except('show');
    Route::resource('budgetSource', BudgetSourceController::class)->except('show');
    Route::resource('planTemplate', PlanTemplateController::class);
    Route::resource('expenseHead', ExpenseHeadController::class);
    Route::resource('grantCategory', GrantCategoryController::class);
});

//report
Route::controller(ReportController::class)->prefix('report')->as('report.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('annual-progress-report', 'annualProgressReport')->name('annual-progress-report');
    Route::post('report-data', 'report')->name('report-data');
    Route::post('annual-progress-report', 'getAnnualProgressReport')->name('get-annual-progress-report');
});
