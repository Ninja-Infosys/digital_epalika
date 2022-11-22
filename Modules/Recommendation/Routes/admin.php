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























Route::view('Health_Treatment_recommendation','recommendation::admin.relation.health_treatment_recommendation')->name('health_treatment_recommendation');
Route::view('birth_property','recommendation::admin.relation.birth_certificate_property_valuation')->name('birth_property');
Route::view('house_map_place','recommendation::admin.relation.house_map_place_recommendation')->name('house_map_place');
Route::view('same_person_confirmation','recommendation::admin.relation.same_persion_confirmation')->name('same_person_confirmation');
Route::view('protector_recommendation','recommendation::admin.relation.prorector_recommendation')->name('protector_recommendation');
Route::view('relation_proof_living','recommendation::admin.relation.relation_proof_living')->name('relation_proof_living');
Route::view('rights_one_proof','recommendation::admin.relation.rights_one_proof')->name('rights_one_proof');




