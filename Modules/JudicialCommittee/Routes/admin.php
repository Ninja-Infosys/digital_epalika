<?php

use Illuminate\Support\Facades\Route;
use Modules\JudicialCommittee\Entities\ComplaintApplication;
use Modules\JudicialCommittee\Http\Controllers\Admin\ComplaintApplicationController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DashboardController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DateCompensationController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DateSheetController;
use Modules\JudicialCommittee\Http\Controllers\Admin\DefendantIssuedDeadlineController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialCommitteeTemplateController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialMemberController;
use Modules\JudicialCommittee\Http\Controllers\Admin\JudicialReceiptBillController;
use Modules\JudicialCommittee\Http\Controllers\Admin\LawsuitNatureController;
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

Route::prefix('setting')->group(function () {
    Route::resource('lawsuitNature', LawsuitNatureController::class);
    Route::resource('judicialCommitteeTemplate', JudicialCommitteeTemplateController::class);
});
