<?php

use App\Http\Controllers\Installer\DatabaseController;
use App\Http\Controllers\Installer\EnvironmentController;
use App\Http\Controllers\Installer\FinalController;
use App\Http\Controllers\Installer\PermissionsController;
use App\Http\Controllers\Installer\RequirementsController;
use App\Http\Controllers\Installer\WelcomeController;

Route::get('/', WelcomeController::class)->name('welcome');

Route::get('environment', [EnvironmentController::class, 'environment'])->name('environment');

Route::get('environment/save', [EnvironmentController::class, 'save'])->name('environment.save');

Route::get('requirements', [RequirementsController::class, 'requirements'])->name('requirements');

Route::get('permissions', [PermissionsController::class,'permissions'])->name('permissions');

Route::get('database', [DatabaseController::class,'database'])->name('database');

Route::get('final', FinalController::class)->name('final');

