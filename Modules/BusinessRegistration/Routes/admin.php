<?php

use Illuminate\Support\Facades\Route;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessNatureController;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessRegistrationController;
use Modules\BusinessRegistration\Http\Controllers\Admin\DashboardController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ForumController;
use Modules\BusinessRegistration\Http\Controllers\Admin\IndustryController;
use Modules\BusinessRegistration\Http\Controllers\Admin\IndustryReportController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ObjectTransactionController;
use Modules\BusinessRegistration\Http\Controllers\Admin\OrganizationRegistrationController;
use Modules\BusinessRegistration\Http\Controllers\Admin\OrganizationReportController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ReportController;
use Modules\BusinessRegistration\Http\Controllers\BusinessRegistrationReportController;
use Modules\BusinessRegistration\Http\Controllers\BusinessRegistrationTemplateController;
use Modules\BusinessRegistration\Http\Controllers\BusinessRenewController;
use Modules\BusinessRegistration\Http\Controllers\ForumRenewController;
use Modules\BusinessRegistration\Http\Controllers\IndustryCategoryController;
use Modules\BusinessRegistration\Http\Controllers\IndustryRenewController;
use Modules\BusinessRegistration\Http\Controllers\OrganizationRenewController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/ajax', [DashboardController::class, 'ajaxData'])->name('dashboard.ajax');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('businessNature', BusinessNatureController::class);
    Route::resource('industryCategory', IndustryCategoryController::class);
    Route::resource('objectTransaction', ObjectTransactionController::class);
    Route::post('businessRegistrationTemplate/staticTemplate', [BusinessRegistrationTemplateController::class, 'getStaticTemplate'])->name('get-static-template');
    Route::get('businessRegistrationTemplate/EnumList', [BusinessRegistrationTemplateController::class, 'enumList'])->name('businessRegistrationTemplate.enumList');
    Route::get('{templateTypeEnum}/businessRegistrationTemplate/{businessRegistrationTemplate}/updateStatus', [BusinessRegistrationTemplateController::class, 'updateStatus'])->name('businessRegistrationTemplate.updateStatus');
    Route::resource('{templateTypeEnum}/businessRegistrationTemplate', BusinessRegistrationTemplateController::class)->names('businessRegistrationTemplate');
});
Route::prefix('registration')->as('registration.')->group(function () {
    Route::resource('businessDetail', BusinessRegistrationController::class)->names('businessRegistration');
    Route::resource('organizationRegistration', OrganizationRegistrationController::class)->names('organizationRegistration');
    Route::resource('industry', IndustryController::class)->names('industry');
    Route::resource('forum', ForumController::class)->names('forum');

});

Route::get('businessRegistration/{businessDetail}/{templateTypeEnum}/editTemplate', [BusinessRegistrationController::class, 'editData'])->name('edit.template');
Route::post('businessRegistration/{businessDetail}/{type}/editTemplate', [BusinessRegistrationController::class, 'storeData'])->name('store.template');
Route::post('businessRegistration/{businessDetail}/customData', [BusinessRegistrationController::class, 'customData'])->name('businessRegistration.store.custom');
Route::get('businessRegistration/{businessDetail}/{templateTypeEnum}/addData', [BusinessRegistrationController::class, 'addData'])->name('add-data.template');
Route::get('businessDetail/{businessDetail}/print', [BusinessRegistrationController::class, 'print'])->name('businessRegistration.print');

Route::resource('businessDetail.businessRenew', BusinessRenewController::class)->names('businessRegistration.businessRenew');
Route::prefix('report')->as('report.')->controller(BusinessRegistrationReportController::class)->group(function () {
    Route::get('dateWise', 'dateWise')->name('dateWise');
    Route::get('businessNature', 'businessNature')->name('businessNature');
});

Route::post('organizationRegistration/{organizationRegistration}/customData', [OrganizationRegistrationController::class, 'customData'])->name('store.custom');
Route::get('organizationRegistration/{organizationRegistration}/printDetail', [OrganizationRegistrationController::class, 'printDetail'])->name('organizationRegistration.printDetail');
Route::resource('organizationRegistration.organizationRenew', OrganizationRenewController::class)->names('organizationRegistration.organizationRenew');

Route::post('industry/{industry}/customData', [IndustryController::class, 'customData'])->name('store.customData');
Route::get('industry/{industry}/printData', [IndustryController::class, 'printData'])->name('industry.printData');
Route::resource('industry.industryRenew', IndustryRenewController::class)->names('industry.industryRenew');
Route::put('industryRenew/{industryRenew}/updateFile', [IndustryRenewController::class,'updateFile'])->name('industryRenew.updateFile');


Route::post('forum/{forum}/customData', [ForumController::class, 'customData'])->name('store.customData');
Route::get('forum/{forum}/printData', [ForumController::class, 'printData'])->name('forum.printData');
Route::resource('forum.forumRenew', ForumRenewController::class)->names('forum.forumRenew');
Route::put('forumRenew/{forumRenew}/updateFile', [ForumRenewController::class,'updateFile'])->name('forumRenew.updateFile');

Route::controller(ReportController::class)->prefix('report')->as('report.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
    Route::get('business-registration-book', 'businessRegistrationBook')->name('business-registration-book');
    Route::post('business-registration-book-report', 'businessRegistrationBookReport')->name('business-registration-book-report');
    Route::get('business-nature-wise', 'businessNatureWise')->name('business-nature-wise');
    Route::post('business-nature-report', 'businessNatureWiseReport')->name('business-nature-report');
    Route::get('object-transaction', 'objectTransaction')->name('object-transaction');
    Route::post('object-transaction-report', 'objectTransactionReport')->name('object-transaction-report');
    Route::get('business-objectTransaction-nature-wise', 'businessObjectTransactionNatureWise')->name('business-objectTransaction-nature-wise');
    Route::post('business-objectTransaction-nature-report', 'businessObjectTransactionNatureReport')->name('business-objectTransaction-nature-report');
    Route::get('ward-wise', 'wardWise')->name('ward-wise');
    Route::post('ward-wise-report', 'wardWiseReport')->name('ward-wise-report');
});

Route::prefix('files')->as('files.')->group(function () {
    Route::view('file', 'businessregistration::admin.file.file')->name('file');
});

Route::controller(OrganizationReportController::class)->prefix('organizationReport')->as('organizationReport.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');

});
Route::controller(IndustryReportController::class)->prefix('industryReport')->as('industryReport.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');

});

