<?php

use App\Http\Controllers\Installer\DatabaseController;
use App\Http\Controllers\Installer\EnvironmentController;
use App\Http\Controllers\Installer\FinalController;
use App\Http\Controllers\Installer\IndexController;
use App\Http\Controllers\Installer\LicenseController;
use App\Http\Controllers\Installer\PermissionController;
use App\Http\Controllers\Installer\RequirementController;
use Illuminate\Support\Facades\Route;

Route::get('welcome', [IndexController::class, 'index'])->name('welcome');
Route::get('requirements', [RequirementController::class, 'requirements'])->name('requirements');
Route::get('permissions', [PermissionController::class, 'permissions'])->name('permissions');
Route::get('license', [LicenseController::class, 'license'])->name('license');
Route::post('save-license', [LicenseController::class, 'saveLicense'])->name('save-license');
Route::get('environment-wizard', [EnvironmentController::class, 'environmentWizard'])->name('environment-wizard');
Route::post('save-wizard', [EnvironmentController::class, 'saveWizard'])->name('save-wizard');
Route::get('database', [DatabaseController::class, 'database'])->name('database');
Route::get('final', [FinalController::class, 'finish'])->name('final');

