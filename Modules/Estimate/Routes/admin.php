<?php

use Illuminate\Support\Facades\Route;
use Modules\Estimate\Http\Controllers\Admin\DashboardController;
use Modules\Estimate\Http\Controllers\LabourController;

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('dashboard/ajax', [DashboardController::class, 'ajaxData'])->name('dashboard.ajax');
Route::prefix('estimateSetting')->group(function () {
    Route::resource('labour', LabourController::class);
    Route::resource('labourRate', LabourRateController::class);
    Route::resource('fuel', FuelController::class);
    Route::resource('fuelRate', FuelRateController::class);
    Route::resource('equipment', EquipmentController::class);
    Route::get('equipmentAdditionalCost/create', [EquipmentAdditionalCostController::class, 'create'])->name('equipmentAdditionalCost.create');
    Route::get('equipmentAdditionalCost', [EquipmentAdditionalCostController::class, 'index'])->name('equipmentAdditionalCost.index');
    Route::get('equipment/{equipment}', [EquipmentAdditionalCostController::class, 'edit'])->name('equipmentAdditionalCost.edit');
    Route::delete('equipment/{equipment}/delete', [EquipmentAdditionalCostController::class, 'destroy'])->name('equipmentAdditionalCost.delete');

    Route::resource('fuelDemand', FuelDemandController::class);
    Route::resource('crewRate', CrewRateController::class);
    Route::resource('materialType', MaterialTypeController::class);
    Route::resource('material', MaterialController::class);
    Route::resource('materialRate', MaterialRateController::class);
    Route::resource('materialCollection', MaterialCollectionController::class);
    Route::resource('cargoHandling', CargoHandlingController::class);
});
