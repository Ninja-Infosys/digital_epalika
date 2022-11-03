<?php


use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\DashboardController;
use Modules\Roaster\Http\Controllers\Setting\DepartmentController;
use Modules\Roaster\Http\Controllers\Setting\DesignationController;
use Modules\Roaster\Http\Controllers\Setting\SubjectController;
use Modules\Roaster\Http\Controllers\TrainerController;
use Modules\Roaster\Http\Controllers\TrainingController;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('department', DepartmentController::class);
    Route::resource('designation',DesignationController::class);
    Route::resource('subject', SubjectController::class);
});

Route::resource('trainer', TrainerController::class);
Route::get('training/{training}/update-status', [TrainingController::class, 'setFormStatus'])->name('training.set-form-status');
Route::get('training/{training}/update-status', [TrainingController::class, 'setFormStatus'])->name('training.set-form-status');
Route::get('training/{training}/pdf', [TrainingController::class, 'pdfExport'])->name('training.pdfExport');
Route::resource('training', TrainingController::class);
