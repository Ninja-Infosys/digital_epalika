<?php

use Illuminate\Support\Facades\Route;
use Modules\Recommendation\Http\Controllers\Admin\DashboardController;
use Modules\Recommendation\Http\Controllers\Admin\FormBuilderController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::view('relation_identify','recommendation::admin.relation.relation_identify')->name('relation_identify');
Route::view('citizenship_recommendation','recommendation::admin.relation.citizenship_recommendation')->name('citizenship_recommendation');
Route::view('restored_tax','recommendation::admin.relation.restored_tax')->name('restored_tax');
Route::view('residental_idenrtification','recommendation::admin.relation.residental_idenrtification')->name('residental_idenrtification');
Route::view('weapon','recommendation::admin.relation.weapon')->name('weapon');
Route::view('home_land_tax','recommendation::admin.relation.home_land_tax')->name('home_land_tax');
Route::view('birth_date','recommendation::admin.relation.birth_date')->name('birth_date');
Route::view('birth_amendment','recommendation::admin.relation.birth_amendment')->name('birth_amendment');
Route::view('business_closed','recommendation::admin.relation.business_closed')->name('business_closed');
Route::view('business_operation','recommendation::admin.relation.business_operation')->name('business_operation');

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('formBuilder', FormBuilderController::class);
});


