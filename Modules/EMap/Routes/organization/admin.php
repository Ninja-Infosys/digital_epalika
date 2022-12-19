<?php

use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Clients\ClientController;
use Modules\EMap\Http\Controllers\Clients\MapApplyController;
use Modules\EMap\Http\Controllers\OrganizationAuthController;
use Modules\EMap\Http\Controllers\OrganizationDashboardController;
use Modules\EMap\Http\Controllers\OrganizationNotificationController;
use Modules\EMap\Http\Controllers\TaxClearanceController;

Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');

Route::prefix('profile')->group(function () {
    Route::get('/', [OrganizationAuthController::class, 'profile'])->name('auth-organization.profile');
});

Route::controller(MapApplyController::class)->group(function () {
    Route::get('mapApply/{mapApply}/map-form-info', 'mapFormInfo')->name('mapFormInfo');
    Route::get('mapApply/{mapApply}/update-status-organization/{noticeTypeEnum}', 'updateStatusOrganization')->name('updateStatusOrganization');
    Route::get('mapApply/{mapApply}/update-sent-admin-status', 'updateStatus')->name('updateStatus');
    Route::get('mapApply/{mapApply}/template-data/{noticeTypeEnum}', 'getTemplateData')->name('getTemplateData');
    Route::post('mapApply/{mapApply}/storeTemplateData/{noticeTypeEnum}', 'storeTemplateData')->name('storeTemplateData');
});
Route::resource('mapApply', MapApplyController::class);
Route::resource('client', ClientController::class);
Route::resource('taxClearance', TaxClearanceController::class);


//organization notification

Route::get('notification', [OrganizationNotificationController::class, 'notification'])->name('notification');
Route::get('notification/{databaseNotification}', [OrganizationNotificationController::class, 'readNotification'])->name('notification.read');
Route::get('readAllNotification', [OrganizationNotificationController::class, 'readAllNotification'])->name('notification.readAllNotification');
