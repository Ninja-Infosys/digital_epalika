<?php

use Illuminate\Support\Facades\Route;
use Modules\Identity\Http\Controllers\CardColorController;
use Modules\Identity\Http\Controllers\DashboardController;
use Modules\Identity\Http\Controllers\DisabilityIdentityCardController;
use Modules\Identity\Http\Controllers\DisabilityReasonController;
use Modules\Identity\Http\Controllers\DisabilityTypeController;
use Modules\Identity\Http\Controllers\GovernmentalDisabilityTypeController;
use Modules\Identity\Http\Controllers\EmployeeSignatureController;
use Modules\Identity\Http\Controllers\RelationshipController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('relationship', RelationshipController::class);
    Route::resource('disabilityReason', DisabilityReasonController::class);
    Route::resource('disabilityType', DisabilityTypeController::class);
    Route::resource('employeeSignature', EmployeeSignatureController::class);
    Route::resource('cardColor', CardColorController::class);
    Route::resource('governmentalDisabilityType', GovernmentalDisabilityTypeController::class);
});

Route::prefix('disability')->group(function (){
    Route::get('disabilityIdentityCard/{disabilityIdentityCard}/print',[DisabilityIdentityCardController::class,'print'])->name('disabilityIdentityCard.print');
    Route::resource('disabilityIdentityCard', DisabilityIdentityCardController::class);
});

Route::view('test','identity::admin.test');

