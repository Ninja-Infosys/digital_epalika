<?php

use App\Http\Controllers\Admin\LandInvoiceController;
use Modules\Revenue\Http\Controllers\Admin\DashboardController;
use Modules\Revenue\Http\Controllers\Admin\InvoiceController;
use Modules\Revenue\Http\Controllers\Admin\PlaceController;
use Modules\Revenue\Http\Controllers\Admin\RevenueCategoryController;
use Modules\Revenue\Http\Controllers\Admin\RevenueController;
use Modules\Revenue\Http\Controllers\Admin\SectorController;
use Modules\Revenue\Http\Controllers\Admin\TaxPayerController;
use Modules\Revenue\Http\Controllers\Admin\TaxPayerTypeController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('taxPayer/{taxPayer}/update-status', [TaxPayerController::class, 'updateStatus'])->name('taxPayer.update-status');
Route::resource('taxPayer', TaxPayerController::class);

Route::resource('land/invoice', LandInvoiceController::class)->names('land.invoice');

Route::resource('invoice', InvoiceController::class);

Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('revenue-category', RevenueCategoryController::class)->except('show');

    Route::get('revenue/{revenue}/update-status', [RevenueController::class, 'updateStatus'])->name('revenue.update-status');
    Route::resource('revenue', RevenueController::class)->except('show');

    Route::resource('taxPayerType', TaxPayerTypeController::class)->except('show');
    Route::resource('sector', SectorController::class)->except('show');
    Route::resource('place', PlaceController::class)->except('show');
});
