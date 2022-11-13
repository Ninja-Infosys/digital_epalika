<?php

use Illuminate\Support\Facades\Route;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessNatureController;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessPurposeController;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessRegistrationController;
use Modules\BusinessRegistration\Http\Controllers\Admin\DashboardController;
use Modules\BusinessRegistration\Http\Controllers\Admin\InvestmentRevenueController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ObjectTransactionController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ObjectTransactionSubCategoryController;
use Modules\BusinessRegistration\Http\Controllers\BusinessRegistrationTemplateController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('businessNature', BusinessNatureController::class);
    Route::resource('objectTransaction', ObjectTransactionController::class);
    Route::resource('objectTransactionSubCategory', ObjectTransactionSubCategoryController::class);
    Route::resource('investmentRevenue', InvestmentRevenueController::class);
    Route::resource('businessPurpose', BusinessPurposeController::class);
    Route::resource('businessRegistrationTemplate', BusinessRegistrationTemplateController::class);
});
Route::get('businessRegistration/{proprietorDetail}/{type}/editTemplate', [BusinessRegistrationController::class, 'editData'])->name('edit.template');
Route::post('businessRegistration/{proprietorDetail}/{type}/editTemplate', [BusinessRegistrationController::class, 'storeData'])->name('store.template');
Route::resource('businessRegistration', BusinessRegistrationController::class);

Route::prefix('files')->as('files.')->group(function () {
    Route::view('file', 'businessregistration::admin.file.file')->name('file');
});
