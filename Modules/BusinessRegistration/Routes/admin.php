<?php


use Illuminate\Support\Facades\Route;
use Modules\BusinessRegistration\Http\Controllers\BusinessNatureController;
use Modules\BusinessRegistration\Http\Controllers\BusinessPurposeController;
use Modules\BusinessRegistration\Http\Controllers\ObjectTransactionController;
use Modules\BusinessRegistration\Http\Controllers\ObjectTransactionSubCategoryController;

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('businessNature', BusinessNatureController::class);
    Route::resource('objectTransaction', ObjectTransactionController::class);
    Route::resource('objectTransactionSubCategory', ObjectTransactionSubCategoryController::class);
    Route::resource('businessPurpose', BusinessPurposeController::class);
});



