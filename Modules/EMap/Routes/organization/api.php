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
    Route::put('buildingDocumentation/{buildingDocumentation}/update-building-land-detail', 'updateBuildingLandDetail')->name('buildingDocumentation.update-building-land-detail');
    Route::get('buildingDocumentation/{buildingDocumentation}/building-land-owner', 'buildingLandOwnerDetail')->name('buildingDocumentation.building-land-owner');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-building-land-owner', 'updateBuildingLandOwner')->name('buildingDocumentation.update-building-land-owner');
    Route::get('buildingDocumentation/{buildingDocumentation}/building-house-owner', 'buildingHouseOwnerDetail')->name('buildingDocumentation.building-house-owner');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-building-house-owner', 'updateBuildingHouseOwner')->name('buildingDocumentation.update-building-house-owner');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-building-applicant-detail', 'updateBuildingApplicantDetail')->name('buildingDocumentation.update-building-applicant-detail');
    Route::get('buildingDocumentation/{buildingDocumentation}/building-neighbours', 'buildingNeighbours')->name('buildingDocumentation.building-neighbours');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-building-neighbours', 'updateBuildingNeighbourDetail')->name('buildingDocumentation.update-building-neighbours');
    Route::get('buildingDocumentation/{buildingDocumentation}/contractor-details', 'contractorDetails')->name('buildingDocumentation.contractor-details');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-contractor-detail', 'updateContractorDetail')->name('buildingDocumentation.update-contractor-detail');
    Route::get('buildingDocumentation/{buildingDocumentation}/building-descriptions', 'buildingDescriptions')->name('buildingDocumentation.building-descriptions');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-building-description', 'updateBuildingDescription')->name('buildingDocumentation.update-building-description');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-building-consultancy-detail', 'updateBuildingConsultancyDetail')->name('buildingDocumentation.update-building-consultancy-detail');
    Route::get('buildingDocumentation/{buildingDocumentation}/storey_descriptions', 'storeyDescriptions')->name('buildingDocumentation.storey_descriptions');
    Route::post('buildingDocumentation/{buildingDocumentation}/update-storey_description', 'updateStoreyDescription')->name('buildingDocumentation.update-building-storey-detail');
    Route::delete('buildingDocumentation/{buildingDocumentation}/storeyDescription/{storeyDescription}', 'deleteStoreyDescription')->name('buildingDocumentation.delete-storey-description');
});
