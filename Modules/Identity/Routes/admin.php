<?php

use Illuminate\Support\Facades\Route;
use Modules\Identity\Http\Controllers\CardColorController;
use Modules\Identity\Http\Controllers\DashboardController;
use Modules\Identity\Http\Controllers\DisabilityCommitteeController;
use Modules\Identity\Http\Controllers\DisabilityIdentityCardController;
use Modules\Identity\Http\Controllers\DisabilityIdentityCardReportController;
use Modules\Identity\Http\Controllers\DisabilityPrintController;
use Modules\Identity\Http\Controllers\DisabilityReasonController;
use Modules\Identity\Http\Controllers\DisabilityTypeController;
use Modules\Identity\Http\Controllers\GovernmentalDisabilityTypeController;
use Modules\Identity\Http\Controllers\EmployeeSignatureController;
use Modules\Identity\Http\Controllers\HospitalController;
use Modules\Identity\Http\Controllers\IdentityMeetingController;
use Modules\Identity\Http\Controllers\RecommendationTemplateSettingController;
use Modules\Identity\Http\Controllers\RelationshipController;
use Modules\Identity\Http\Controllers\SeniorCitizenDetailController;
use Modules\Identity\Http\Controllers\SeniorCitizenDetailReportController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('relationship', RelationshipController::class);
    Route::resource('disabilityReason', DisabilityReasonController::class);
    Route::resource('disabilityType', DisabilityTypeController::class);
    Route::put('employeeSignature/{employeeSignature}/updateStatus', [EmployeeSignatureController::class, 'updateStatus'])->name('employeeSignature.updateStatus');
    Route::resource('employeeSignature', EmployeeSignatureController::class);
    Route::resource('cardColor', CardColorController::class);
    Route::resource('governmentalDisabilityType', GovernmentalDisabilityTypeController::class);
    Route::resource('hospital', HospitalController::class);
    Route::resource('disabilityCommittee', DisabilityCommitteeController::class);
    Route::resource('recommendationTemplateSetting', RecommendationTemplateSettingController::class)->only(['index','store']);
});

Route::prefix('disability')->group(function () {
    Route::get('disabilityIdentityCard/search-citizenship', [DisabilityIdentityCardController::class, 'searchCitizenshipNo'])->name('disabilityIdentityCard.searchCitizenshipNo');
    Route::get('disabilityIdentityCard/{disabilityIdentityCard}/print', [DisabilityIdentityCardController::class, 'print'])->name('disabilityIdentityCard.print');
    Route::get('disabilityIdentityCard/{disabilityIdentityCard}/printDetail', [DisabilityIdentityCardController::class, 'printDetail'])->name('disabilityIdentityCard.printDetail');
    Route::get('disabilityIdentityCard/{disabilityIdentityCard}/printAll', [DisabilityIdentityCardController::class, 'printAll'])->name('disabilityIdentityCard.printAll');
    Route::resource('disabilityIdentityCard.disabilityPrint', DisabilityPrintController::class)->only('store');
    Route::resource('disabilityIdentityCard', DisabilityIdentityCardController::class);
});

Route::resource('identityMeeting', IdentityMeetingController::class);

Route::prefix('seniorCitizen')->group(function () {
    Route::get('seniorCitizenDetail/search-citizenship', [SeniorCitizenDetailController::class, 'searchCitizenshipNo'])->name('seniorCitizenDetail.searchCitizenshipNo');
    Route::get('seniorCitizenDetail/{seniorCitizenDetail}/print', [SeniorCitizenDetailController::class, 'print'])->name('seniorCitizenDetail.print');
    Route::resource('seniorCitizenDetail', SeniorCitizenDetailController::class);
});

Route::prefix('seniorCitizenReport')->group(function () {
    Route::post('seniorCitizenReport/reportData', [SeniorCitizenDetailReportController::class, 'report'])->name('seniorCitizenReport.report');
});

Route::prefix('reports')->group(function () {
    Route::get('seniorCitizenReport', [SeniorCitizenDetailReportController::class, 'index'])->name('seniorCitizenReport.index');
    Route::get('senior-citizen-ward-wise', [SeniorCitizenDetailReportController::class, 'seniorCitizenWardWise'])->name('senior-citizen-ward-wise');
    Route::post('senior-citizen-ward-wise-report', [SeniorCitizenDetailReportController::class, 'seniorCitizenWardWiseReport'])->name('senior-citizen-ward-wise-report');
    Route::get('disabilityIdentityCardReport', [DisabilityIdentityCardReportController::class, 'report'])->name('disabilityIdentityCardReport');
    Route::get('ward-wise', [DisabilityIdentityCardReportController::class, 'wardWise'])->name('ward-wise');
    Route::post('ward-wise-report', [DisabilityIdentityCardReportController::class, 'wardWiseReport'])->name('ward-wise-report');
    Route::get('governmental-disability-type', [DisabilityIdentityCardReportController::class, 'governmentalDisabilityType'])->name('governmental-disability-type');
    Route::post('governmental-disability-type-report', [DisabilityIdentityCardReportController::class, 'governmentalDisabilityTypeReport'])->name('governmental-disability-type-report');
    Route::get('disability-type', [DisabilityIdentityCardReportController::class, 'disabilityType'])->name('disability-type');
    Route::post('disability-type-report', [DisabilityIdentityCardReportController::class, 'disabilityTypeReport'])->name('disability-type-report');
});
Route::view('test', 'identity::admin.test');
