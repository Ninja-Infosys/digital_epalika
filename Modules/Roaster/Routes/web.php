<?php


use Illuminate\Support\Facades\Route;
use Modules\Roaster\Http\Controllers\FrontendController;

Route::get('/',[FrontendController::class,'index'])->name('index');

Route::get('trainer-form',[FrontendController::class,'trainerForm'])->name('trainer-form');
Route::get('application',[FrontendController::class,'application'])->name('application');
Route::get('open/trainings/{trainingType}', [FrontendController::class, 'individualTrainingView'])->name('individual-training-view');
Route::get('training/{training}/farmer', [FrontendController::class, 'traineeForm'])->name('traineeForm');
Route::get('training/{training}/technical-trainee', [FrontendController::class, 'technicalTraineeForm'])->name('technicalTraineeForm');

