<?php

use Illuminate\Support\Facades\Route;
use Modules\Recommendation\Http\Controllers\Admin\DashboardController;

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
Route::view('house_destroy','recommendation::admin.relation.house_destroy')->name('house_destroy');
Route::view('personal_detail','recommendation::admin.relation.personal_detail_certifiate_recommendation')->name('personal_detail');
Route::view('name_birth','recommendation::admin.relation.Name_birth_recommendation')->name('name_birth');
Route::view('land_paper','recommendation::admin.relation.land_paper_lost_recommendation')->name('land_paper');
Route::view('kitta_recommendation','recommendation::admin.relation.kitta_recommendation')->name('kitta_recommendation');
Route::view('protector_proven','recommendation::admin.relation.protector_proven')->name('protector_proven');
Route::view('relation_proof','recommendation::admin.relation.relation_proof_between_deathperson_recommendation')->name('relation_proof');
Route::view('alive_proof','recommendation::admin.relation.alive_proof_recommendation')->name('alive_proof');




