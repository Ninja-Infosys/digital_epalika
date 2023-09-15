<?php

use Illuminate\Support\Facades\Route;
use Modules\Recommendation\Http\Controllers\Admin\DashboardController;
use Modules\Recommendation\Http\Controllers\Admin\PersonalDetailController;
use Modules\Recommendation\Http\Controllers\Admin\RecommendationTemplateController;
use Modules\Recommendation\Http\Controllers\Admin\RegistrationDetailController;
use Modules\Recommendation\Http\Controllers\RecommendationCategoryController;
use Modules\Recommendation\Http\Controllers\RecommendationSettingController;
use Modules\Recommendation\Http\Controllers\SipharishCategoryController;
use Modules\Recommendation\Http\Controllers\ReportController;
use Modules\Recommendation\Http\Controllers\SipharisSubCategoryController;
use Modules\Recommendation\Http\Controllers\SipharishFormTypeController;
use Modules\Recommendation\Http\Controllers\SipharisFormFieldsController;



Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::prefix('setting')->as('setting.')->group(function () {
    Route::resource('recommendationSetting', RecommendationSettingController::class)->only(['index','update']);
    Route::get('{type}/recommendationCategory/{recommendationCategory}/recommendationTemplate/{recommendationTemplate}/updateStatus', [RecommendationTemplateController::class, 'updateStatus'])->name('recommendationTemplate.updateStatus');
    Route::get('recommendationCategory/{recommendationCategory}/getTemplate', [RecommendationCategoryController::class,'getTemplateData'])->name('recommendationCategory.getTemplate');
    Route::get('{type}/recommendationCategory/{recommendationCategory}/updateStatus', [RecommendationCategoryController::class,'updateStatus'])->name('recommendationCategory.updateStatus');
    Route::resource('{type}/recommendationCategory', RecommendationCategoryController::class);
    Route::resource('{type}/recommendationCategory.recommendationTemplate', RecommendationTemplateController::class);
    Route::resource('personalDetail', PersonalDetailController::class);
});

Route::post('registrationDetail/{registrationDetail}/ocFile', [RegistrationDetailController::class,'ocFile'])->name('registrationDetail.ocFile');
Route::resource('recommendationCategory.registrationDetail', RegistrationDetailController::class);

Route::get('sipharish/sipharishCategory',[SipharishCategoryController::class,'index'])->name('sipharish.index');
Route::get('sipharish/sipharishCategory/create',[SipharishCategoryController::class,'create'])->name('sipharish.create');
Route::post('sipharish/sipharishCategory/store',[SipharishCategoryController::class,'store'])->name('sipharish.store');
Route::get('sipharish/sipharishCategory/toggleStatus/{recommendationCategory}',[SipharishCategoryController::class,'updateStatus'])->name('sipharish.updateStatus');
Route::get('sipharish/sipharishCategory/edit/{sipharisModel}',[SipharishCategoryController::class,'edit'])->name('sipharish.edit');
Route::post('sipharish/sipharishCategory/update/{sipharisModel}',[SipharishCategoryController::class,'update'])->name('sipharish.update');


Route::get('sipharish/sipharishSubCategory',[SipharisSubCategoryController::class,'index'])->name('sipharish.subcategory.index');
Route::get('sipharish/sipharishSubCategory/create',[SipharisSubCategoryController::class,'create'])->name('sipharish.subcategory.create');
Route::post('sipharish/sipharishSubCategory/store',[SipharisSubCategoryController::class,'store'])->name('sipharish.subcategory.store');
Route::get('sipharish/sipharishSubCategory/toggleStatus/{recommendationCategory}',[SipharisSubCategoryController::class,'updateStatus'])->name('sipharish.subcategory.updateStatus');
Route::get('sipharish/sipharishSubCategory/edit/{siphariSubsModel}',[SipharisSubCategoryController::class,'edit'])->name('sipharish.subcategory.edit');
Route::post('sipharish/sipharishSubCategory/update/{siphariSubsModel}',[SipharisSubCategoryController::class,'update'])->name('sipharish.subcategory.update');

Route::get('sipharish/sipharishFormType',[SipharishFormTypeController::class,'index'])->name('sipharish.form-type.index');
Route::get('sipharish/sipharishFormType/create',[SipharishFormTypeController::class,'create'])->name('sipharish.form-type.create');
Route::post('sipharish/sipharishFormType/store',[SipharishFormTypeController::class,'store'])->name('sipharish.form-type.store');
Route::get('sipharish/sipharishFormType/edit/{sipharisFormTypeModel}',[SipharishFormTypeController::class,'edit'])->name('sipharish.form-type.edit');
Route::put('sipharish/sipharishFormType/update/{sipharisFormTypeModel}',[SipharishFormTypeController::class,'update'])->name('sipharish.form-type.update');


Route::get('sipharish/sipharishFormFields/create/{formType}',[SipharisFormFieldsController::class,'create'])->name('sipharish.form-fields.create');
Route::post('sipharish/sipharishFormFields/store/{sipharis}',[SipharisFormFieldsController::class,'store'])->name('sipharish.form-fields.store');


Route::prefix('report')->as('report.')->controller(ReportController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('report-data', 'report')->name('report-data');
    Route::get('ward-wise', 'wardWise')->name('ward-wise');
    Route::post('ward-wise-report', 'wardWiseReport')->name('ward-wise-report');
    Route::get('recommendation-category-wise', 'recommendationCategoryWise')->name('recommendation-category-wise');
    Route::post('recommendation-category-wise-report', 'recommendationCategoryWiseReport')->name('recommendation-category-wise-report');
    Route::get('personal-detail', 'personalDetail')->name('personal-detail');
    Route::post('personal-detail-report', 'personalDetailReport')->name('personal-detail-report');
});
