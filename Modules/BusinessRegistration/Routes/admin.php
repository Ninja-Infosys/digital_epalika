<?php

use Illuminate\Support\Facades\Route;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessNatureController;
use Modules\BusinessRegistration\Http\Controllers\Admin\BusinessPurposeController;
use Modules\BusinessRegistration\Http\Controllers\Admin\DashboardController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ObjectTransactionController;
use Modules\BusinessRegistration\Http\Controllers\Admin\ObjectTransactionSubCategoryController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('businessNature', BusinessNatureController::class);
    Route::resource('objectTransaction', ObjectTransactionController::class);
    Route::resource('objectTransactionSubCategory', ObjectTransactionSubCategoryController::class);
    Route::resource('businessPurpose', BusinessPurposeController::class);
});

Route::prefix('files')->as('files.')->group(function (){
    Route::view('registration-file', 'businessregistration::admin.file.firm_registration_letter')->name('registration-file');
    Route::view('tax-file', 'businessregistration::admin.file.tax_person_proof_letter')->name('tax-file');
});




