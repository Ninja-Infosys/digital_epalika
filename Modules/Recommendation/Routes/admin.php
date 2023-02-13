<?php

use Illuminate\Support\Facades\Route;
use Modules\Circular\Http\Controllers\Admin\RegistrationController;
use Modules\Recommendation\Http\Controllers\Admin\DashboardController;
use Modules\Recommendation\Http\Controllers\Admin\FormBuilderController;
use Modules\Recommendation\Http\Controllers\admin\PersonalDetailController;
use Modules\Recommendation\Http\Controllers\Admin\RecommendationController;
use Modules\Recommendation\Http\Controllers\Admin\RecommendationTemplateController;
use Modules\Recommendation\Http\Controllers\admin\RegistrationDetailController;
use Modules\Recommendation\Http\Controllers\RecommendationCategoryController;

Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::view('relation_identify', 'recommendation::admin.relation.relation_identify')->name('relation_identify');
Route::view('citizenship_recommendation', 'recommendation::admin.relation.citizenship_recommendation')->name('citizenship_recommendation');
Route::view('restored_tax', 'recommendation::admin.relation.restored_tax')->name('restored_tax');
Route::view('residental_idenrtification', 'recommendation::admin.relation.residental_idenrtification')->name('residental_idenrtification');
Route::view('weapon', 'recommendation::admin.relation.weapon')->name('weapon');
Route::view('home_land_tax', 'recommendation::admin.relation.home_land_tax')->name('home_land_tax');
Route::view('birth_date', 'recommendation::admin.relation.birth_date')->name('birth_date');
Route::view('birth_amendment', 'recommendation::admin.relation.birth_amendment')->name('birth_amendment');
Route::view('business_closed', 'recommendation::admin.relation.business_closed')->name('business_closed');
Route::view('business_operation', 'recommendation::admin.relation.business_operation')->name('business_operation');
Route::view('house_destroy', 'recommendation::admin.relation.house_destroy')->name('house_destroy');
Route::view('personal_detail', 'recommendation::admin.relation.personal_detail_certifiate_recommendation')->name('personal_detail');
Route::view('name_birth', 'recommendation::admin.relation.Name_birth_recommendation')->name('name_birth');
Route::view('land_paper', 'recommendation::admin.relation.land_paper_lost_recommendation')->name('land_paper');
Route::view('kitta_recommendation', 'recommendation::admin.relation.kitta_recommendation')->name('kitta_recommendation');
Route::view('protector_proven', 'recommendation::admin.relation.protector_proven')->name('protector_proven');
Route::view('relation_proof', 'recommendation::admin.relation.relation_proof_between_deathperson_recommendation')->name('relation_proof');
Route::view('alive_proof', 'recommendation::admin.relation.alive_proof_recommendation')->name('alive_proof');
Route::view('land_owner', 'recommendation::admin.relation.land_owner_right_recommendation')->name('land_owner');
Route::view('enterprises', 'recommendation::admin.relation.enterprises_placechange_recommendation')->name('enterprises');
Route::view('maintain_house', 'recommendation::admin.relation.maintain_house')->name('maintain_house');
Route::view('classes_adding', 'recommendation::admin.relation.school_classes_adding_recommendation')->name('classes_adding');
Route::view('disabled_people', 'recommendation::admin.relation.disabled_recommendation')->name('disabled_people');
Route::view('financial_certificate', 'recommendation::admin.relation.financial_condition_certificate')->name('financial_certificate');
Route::view('weak_financial', 'recommendation::admin.relation.weak_financial_condition')->name('weak_financial');
Route::view('school_area_changing', 'recommendation::admin.relation.school_area_changing_recommendation')->name('school_area_changing');
Route::view('water_electricity', 'recommendation::admin.relation.water_electricity_adding_recommendation')->name('water_electricity');
Route::view('caste_identify', 'recommendation::admin.relation.caste_identify_and_caste_recommendation')->name('caste_identify');
Route::view('prevailing_law', 'recommendation::admin.relation.prevailing_law_recommendation')->name('prevailing_law');
Route::view('business_renewal', 'recommendation::admin.relation.business_renewal')->name('business_renewal');
Route::view('Health_Treatment_recommendation', 'recommendation::admin.relation.health_treatment_recommendation')->name('health_treatment_recommendation');
Route::view('birth_property', 'recommendation::admin.relation.birth_certificate_property_valuation')->name('birth_property');
Route::view('house_map_place', 'recommendation::admin.relation.house_map_place_recommendation')->name('house_map_place');
Route::view('same_person_confirmation', 'recommendation::admin.relation.same_persion_confirmation')->name('same_person_confirmation');
Route::view('protector_recommendation', 'recommendation::admin.relation.prorector_recommendation')->name('protector_recommendation');
Route::view('relation_proof_living', 'recommendation::admin.relation.relation_proof_living')->name('relation_proof_living');
Route::view('rights_one_proof', 'recommendation::admin.relation.rights_one_proof')->name('rights_one_proof');
Route::view('transfer_recommendation', 'recommendation::admin.relation.transfer_recommendation')->name('transfer_recommendation');
Route::view('primary_school', 'recommendation::admin.relation.primary_school_recommendation')->name('primary_school');
Route::view('land_valuation', 'recommendation::admin.relation.land_valuation')->name('land_valuation');
Route::view('way_house_proof', 'recommendation::admin.relation.way_house_proof')->name('way_house_proof');
Route::view('fort_detail_proof', 'recommendation::admin.relation.fort_detail_proof')->name('fort_detail_proof');

Route::prefix('setting')->as('setting.')->group(function () {
//    Route::get('{applicationTypeEnum}/formBuilder/{formBuilder}/updateStatus', [FormBuilderController::class, 'updateStatus'])->name('formBuilder.updateStatus');
//    Route::resource('{applicationTypeEnum}/formBuilder', FormBuilderController::class)->names('formBuilder');
    Route::get('{applicationTypeEnum}/recommendationTemplate/{recommendationTemplate}/updateStatus', [RecommendationTemplateController::class, 'updateStatus'])->name('recommendationTemplate.updateStatus');
    Route::get('recommendationCategory/{recommendationCategory}/getTemplate',[RecommendationCategoryController::class,'getTemplateData'])->name('recommendationCategory.getTemplate');
    Route::get('{type}/recommendationCategory/{recommendationCategory}/updatestatus', [RecommendationCategoryController::class,'updatestatus'])->name('recommendationCategory.updatestatus');
    Route::resource('{type}/recommendationCategory',RecommendationCategoryController::class);
    Route::resource('{type}/recommendationCategory.recommendationTemplate', RecommendationTemplateController::class);
    Route::resource('personalDetail', PersonalDetailController::class);
});

Route::resource('registrationDetail', RegistrationDetailController::class);
//Route::get('application/list', [RecommendationController::class, 'getApplicationList'])->name('recommendation.list');
//Route::get('application/recommendation/{recommendation}/print', [RecommendationController::class, 'printRecommendation'])->name('recommendation.print');
//Route::post('recommendation/{recommendation}/storeFormData', [RecommendationController::class,'formData'])->name('recommendation.storeFormData');
//Route::resource('application/{applicationTypeEnum}/recommendation', RecommendationController::class)->names('recommendation');

