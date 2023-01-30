<?php

use Illuminate\Support\Facades\Route;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessNatureController;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessPurposeController;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessRegistrationController;
use Modules\BusinessRegistration\Http\Controllers\Admin\DashboardController;
use Modules\BusinessRegistration\Http\Controllers\Admin\InvestmentRevenueController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ObjectTransactionController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ObjectTransactionSubCategoryController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ReportController;
use Modules\BusinessRegistration\Http\Controllers\BusinessRegistrationReportController;
use Modules\BusinessRegistration\Http\Controllers\BusinessRegistrationTemplateController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('businessNature', BusinessNatureController::class);
    Route::resource('objectTransaction', ObjectTransactionController::class);

    Route::post('businessRegistrationTemplate/staticTemplate', [BusinessRegistrationTemplateController::class,'getStaticTemplate'])->name('get-static-template');
    Route::get('businessRegistrationTemplate/EnumList', [BusinessRegistrationTemplateController::class,'enumList'])->name('businessRegistrationTemplate.enumList');
    Route::get('{templateTypeEnum}/businessRegistrationTemplate/{businessRegistrationTemplate}/updateStatus', [BusinessRegistrationTemplateController::class,'updateStatus'])->name('businessRegistrationTemplate.updateStatus');
    Route::resource('{templateTypeEnum}/businessRegistrationTemplate', BusinessRegistrationTemplateController::class)->names('businessRegistrationTemplate');
});
Route::get('businessRegistration/{businessDetail}/{templateTypeEnum}/editTemplate', [BusinessRegistrationController::class, 'editData'])->name('edit.template');
Route::post('businessRegistration/{businessDetail}/{type}/editTemplate', [BusinessRegistrationController::class, 'storeData'])->name('store.template');
Route::post('businessRegistration/{businessDetail}/{type}/customData', [BusinessRegistrationController::class, 'customData'])->name('store.custom');
Route::get('businessRegistration/{businessDetail}/{templateTypeEnum}/addData', [BusinessRegistrationController::class, 'addData'])->name('add-data.template');
Route::resource('businessDetail', BusinessRegistrationController::class)->names('businessRegistration');

Route::prefix('report')->as('report.')->controller(BusinessRegistrationReportController::class)->group(function () {
    Route::get('dateWise', 'dateWise')->name('dateWise');
    Route::get('businessNature', 'businessNature')->name('businessNature');
});


Route::controller(ReportController::class)->prefix('reports')->as('report.')->group(function () {
    Route::get('/', 'getRequiredData')->name('report');
    Route::post('report-data', 'report')->name('report-data');
});

Route::prefix('files')->as('files.')->group(function () {
    Route::view('file', 'businessregistration::admin.file.file')->name('file');
});
