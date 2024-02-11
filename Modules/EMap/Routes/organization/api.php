<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Clients\Api\OrganizationApplicationsController;

Route::controller(OrganizationApplicationsController::class)->group(function () {
    Route::put('mapApply/{mapApply}/update-detail', 'updateMapApplication')->name('mapApply.update-detail');
    Route::get('mapApply/{mapApply}/storey-details', 'storeyDetails')->name('mapApply.storey-details');
    Route::post('mapApply/{mapApply}/update-storey-detail', 'updateStoreyDetail')->name('mapApply.update-storey-detail');
    Route::delete('mapApply/{mapApply}/storeyDetail/{storeyDetail}', 'deleteStoreyDetail')->name('mapApply.delete-storey-detail');
    Route::put('mapApply/{mapApply}/update-land-detail', 'updateLandDetail')->name('mapApply.update-land-detail');
    Route::put('mapApply/{mapApply}/update-land-owner', 'updateLandOwner')->name('mapApply.update-land-owner');
    Route::put('mapApply/{mapApply}/update-house-owner', 'updateHouseOwner')->name('mapApply.update-house-owner');
});
