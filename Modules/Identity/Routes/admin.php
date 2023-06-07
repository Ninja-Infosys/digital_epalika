<?php

use Illuminate\Support\Facades\Route;
use Modules\Identity\Http\Controllers\CardColorController;
use Modules\Identity\Http\Controllers\DashboardController;
use Modules\Identity\Http\Controllers\DisabilityIdentityCardController;
use Modules\Identity\Http\Controllers\DisabilityIdentityCardReportController;
use Modules\Identity\Http\Controllers\DisabilityPrintController;
use Modules\Identity\Http\Controllers\DisabilityReasonController;
use Modules\Identity\Http\Controllers\DisabilityTypeController;
use Modules\Identity\Http\Controllers\GovernmentalDisabilityTypeController;
use Modules\Identity\Http\Controllers\EmployeeSignatureController;
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
});

Route::prefix('disability')->group(function () {
    Route::get('disabilityIdentityCard/{disabilityIdentityCard}/print', [DisabilityIdentityCardController::class, 'print'])->name('disabilityIdentityCard.print');
    Route::get('disabilityIdentityCard/{disabilityIdentityCard}/printDetail', [DisabilityIdentityCardController::class, 'printDetail'])->name('disabilityIdentityCard.printDetail');
    Route::resource('disabilityIdentityCard.disabilityPrint', DisabilityPrintController::class);
    Route::resource('disabilityIdentityCard', DisabilityIdentityCardController::class);
});

Route::prefix('seniorCitizen')->group(function () {
    Route::get('seniorCitizenDetail/{seniorCitizenDetail}/print',[SeniorCitizenDetailController::class,'print'])->name('seniorCitizenDetail.print');
    Route::resource('seniorCitizenDetail', SeniorCitizenDetailController::class);
});

Route::prefix('seniorCitizenReport')->group(function (){
Route::post('seniorCitizenReport/reportData', [SeniorCitizenDetailReportController::class,'report'])->name('seniorCitizenReport.report');
});

Route::prefix('reports')->group(function () {
    Route::get('seniorCitizenReport', [SeniorCitizenDetailReportController::class,'index'])->name('seniorCitizenReport.index');
    Route::get('disabilityIdentityCardReport', [DisabilityIdentityCardReportController::class,'report'])->name('disabilityIdentityCardReport');
});
Route::view('test', 'identity::admin.test');

