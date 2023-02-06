<?php

use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Http\Controllers\Admin\ComplaintApplicationController;
use Modules\JudicialCommittee\Http\Controllers\Admin\ComplaintDecisionController;
use Modules\JudicialCommittee\Http\Controllers\Admin\ComplaintLogController;
use Modules\JudicialCommittee\Http\Controllers\Admin\ComplaintSubjectController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DashboardController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DateCompensationController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DateSheetController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DefendantIssuedDeadlineController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialCommitteeTemplateController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialMemberController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialReceiptBillController;
use Modules\JudicialCommittee\Http\Controllers\Admin\LawsuitNatureController;
use Modules\JudicialCommittee\Http\Controllers\Admin\ReportController;
use Modules\JudicialCommittee\Http\Controllers\Admin\WrittenAnswerController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::resource('judicialMember', JudicialMemberController::class);
Route::get('complaintApplication/registered', [ComplaintApplicationController::class, 'registeredApplications'])->name('registeredApplication');
Route::resource('complaintApplication', ComplaintApplicationController::class);
Route::resource('complaintApplication/{complaintApplication}/judicialReceiptBill', JudicialReceiptBillController::class)->names('complaintApplication.judicialReceiptBill');
Route::resource('complaintApplication/{complaintApplication}/dateSheet', DateSheetController::class)->names('complaintApplication.dateSheet');
Route::resource('complaintApplication/{complaintApplication}/defendantIssuedDeadline', DefendantIssuedDeadlineController::class)->names('complaintApplication.defendantIssuedDeadline');
Route::resource('complaintApplication/{complaintApplication}/dateCompensation', DateCompensationController::class)->names('complaintApplication.dateCompensation');
Route::resource('complaintApplication/{complaintApplication}/writtenAnswer', WrittenAnswerController::class)->names('complaintApplication.writtenAnswer');
Route::resource('complaintApplication/{complaintApplication}/complaintDecision', ComplaintDecisionController::class)->names('complaintApplication.complaintDecision');
Route::get('complaintApplication/{complaintApplication}/complaintLog',[ComplaintLogController::class,'index'])->name('complaintApplication.complaintLog.index');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('lawsuitNature', LawsuitNatureController::class);
    Route::resource('judicialCommitteeTemplate', JudicialCommitteeTemplateController::class);
    Route::resource('complaintSubject', ComplaintSubjectController::class);
});

Route::controller(ReportController::class)->prefix('reports')->as('report.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
});
