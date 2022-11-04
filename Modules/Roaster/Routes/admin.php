<?php

use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\DashboardController;
use Modules\Roaster\Http\Controllers\Setting\SubjectController;
use Modules\Roaster\Http\Controllers\TrainerController;
use Modules\Roaster\Http\Controllers\TrainingController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('subject', SubjectController::class);
});

Route::resource('trainer', TrainerController::class)->except(['store','destroy','update']);
Route::put('training/{training}/update-marks', [TrainingController::class, 'updateMarks'])->name('training.update-marks');
Route::get('training/{training}/report', [TrainingController::class, 'report'])->name('training.report');
Route::get('training/{training}/update-status', [TrainingController::class, 'setFormStatus'])->name('training.set-form-status');
Route::get('training/{training}/marks', [TrainingController::class, 'marks'])->name('training.marks');
Route::put('training/{training}/update-photo', [TrainingController::class, 'storePhotos'])->name('training.store-photos');
Route::get('training/{training}/pdf', [TrainingController::class, 'pdfExport'])->name('training.pdfExport');
Route::resource('training', TrainingController::class);
