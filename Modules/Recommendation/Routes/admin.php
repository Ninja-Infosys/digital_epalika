<?php

use Illuminate\Support\Facades\Route;
use Modules\Recommendation\Http\Controllers\Admin\DashboardController;
use Modules\Recommendation\Http\Controllers\Admin\PersonalDetailController;
use Modules\Recommendation\Http\Controllers\Admin\RecommendationTemplateController;
use Modules\Recommendation\Http\Controllers\Admin\RegistrationDetailController;
use Modules\Recommendation\Http\Controllers\RecommendationCategoryController;
use Modules\Recommendation\Http\Controllers\ReportController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::prefix('setting')->as('setting.')->group(function () {
    Route::get('{type}/recommendationCategory/{recommendationCategory}/recommendationTemplate/{recommendationTemplate}/updateStatus', [RecommendationTemplateController::class, 'updateStatus'])->name('recommendationTemplate.updateStatus');
    Route::get('recommendationCategory/{recommendationCategory}/getTemplate',[RecommendationCategoryController::class,'getTemplateData'])->name('recommendationCategory.getTemplate');
    Route::get('{type}/recommendationCategory/{recommendationCategory}/updateStatus', [RecommendationCategoryController::class,'updateStatus'])->name('recommendationCategory.updateStatus');
    Route::resource('{type}/recommendationCategory',RecommendationCategoryController::class);
    Route::resource('{type}/recommendationCategory.recommendationTemplate', RecommendationTemplateController::class);
    Route::resource('personalDetail', PersonalDetailController::class);
});

Route::post('registrationDetail/{registrationDetail}/ocFile',[RegistrationDetailController::class,'ocFile'])->name('registrationDetail.ocFile');
Route::resource('registrationDetail', RegistrationDetailController::class);

Route::prefix('report')->as('report.')->controller(ReportController::class)->group(function (){
    Route::get('/','index')->name('index');
});
