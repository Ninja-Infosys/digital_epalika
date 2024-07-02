<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Clients\Api\OrganizationApplicationsController;
use Modules\EMap\Http\Controllers\Clients\Api\OrganizationBuildingController;

Route::controller(OrganizationApplicationsController::class)->group(function () {
    Route::put('mapApply/{mapApply}/update-detail', 'updateMapApplication')->name('mapApply.update-detail');
    Route::get('mapApply/{mapApply}/storey-details', 'storeyDetails')->name('mapApply.storey-details');
    Route::post('mapApply/{mapApply}/update-storey-detail', 'updateStoreyDetail')->name('mapApply.update-storey-detail');
    Route::delete('mapApply/{mapApply}/storeyDetail/{storeyDetail}', 'deleteStoreyDetail')->name('mapApply.delete-storey-detail');
    Route::put('mapApply/{mapApply}/update-land-detail', 'updateLandDetail')->name('mapApply.update-land-detail');
    Route::get('mapApply/{mapApply}/land-owner', 'landOwnerDetail')->name('mapApply.land-owner');
    Route::post('mapApply/{mapApply}/update-land-owner', 'updateLandOwner')->name('mapApply.update-land-owner');
    Route::get('mapApply/{mapApply}/house-owner', 'houseOwnerDetail')->name('mapApply.house-owner');
    Route::post('mapApply/{mapApply}/update-house-owner', 'updateHouseOwner')->name('mapApply.update-house-owner');
    Route::get('mapApply/{mapApply}/four-forts', 'fourForts')->name('mapApply.four-forts');
    Route::post('mapApply/{mapApply}/update-four-forts', 'updateFourFortDetail')->name('mapApply.update-four-forts');
    Route::get('mapApply/{mapApply}/designer-details', 'designerDetails')->name('mapApply.designer-details');
    Route::post('mapApply/{mapApply}/update-designer-detail', 'updateDesignerDetail')->name('mapApply.update-designer-detail');
    Route::get('mapApply/{mapApply}/applicant-detail', 'applicantDetail')->name('mapApply.applicant-detail');
    Route::post('mapApply/{mapApply}/update-applicant-detail', 'updateApplicantDetail')->name('mapApply.update-applicant-detail');
    Route::get('mapApply/{mapApply}/criteria-details', 'criteriaDetails')->name('mapApply.criteria-details');
    Route::post('mapApply/{mapApply}/update-criteria-detail', 'updateCriteriaDetail')->name('mapApply.update-criteria-detail');
    Route::get('mapApply/{mapApply}/building-details', 'buildingDetails')->name('mapApply.building-details');
    Route::post('mapApply/{mapApply}/update-building-detail', 'updateBuildingDetail')->name('mapApply.update-building-detail');
    Route::post('mapApply/{mapApply}/update-consultancy-detail', 'updateConsultancyDetail')->name('mapApply.update-consultancy-detail');
});
Route::controller(OrganizationBuildingController::class)->group(function () {
    Route::put('buildingDocumentation/{buildingDocumentation}/update-building-documentation-detail', 'updateBuildingApplication')->name('buildingDocumentation.update-building-documentation-detail');
    Route::get('buildingDocumentation/{buildingDocumentation}/building-storey-details', 'buildingStoreyDetails')->name('buildingDocumentation.building-storey-details');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-building-storey-detail', 'updateBuildingStoreyDetail')->name('buildingDocumentation.update-building-storey-detail');
    Route::delete('buildingDocumentation/{buildingDocumentation}/buildingStoreyDetail/{buildingStoreyDetail}', 'deleteBuildingStoreyDetail')->name('buildingDocumentation.delete-building-storey-detail');
});
