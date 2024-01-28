<?php

use App\Http\Controllers\Admin\Global\OrganizationAuthController;
use App\Http\Controllers\Admin\Global\OrganizationDashboardController;
use App\Http\Controllers\Admin\Global\RenewedController;
use App\Http\Controllers\Admin\Global\TaxClearanceController;
use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\AttachDocumentController;
use Modules\EMap\Http\Controllers\Clients\MapApplyController;
use Modules\EMap\Http\Controllers\OrganizationNotificationController;

// Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');
Route::get('dashboard', OrganizationDashboardController::class)->name('dashboard');
Route::prefix('organization')->as('organization.')->group(function () {    
    // Route::get('login', [OrganizationAuthController::class, 'showOrganizationLoginForm'])->name('login.form');
    Route::post('login', [OrganizationAuthController::class, 'organizationLogin'])->name('login');
    Route::get('register', [OrganizationAuthController::class, 'showOrganizationRegisterForm'])->name('register.form');
    Route::get('register-person', [OrganizationAuthController::class, 'showOrganizationRegisterFormPerson'])->name('register.formPerson');
    
    Route::get('{organization}/invitation', [OrganizationAuthController::class, 'invitation'])->name('invitation');
    Route::get('password/create', [OrganizationAuthController::class, 'create'])->name('password.create')->middleware(['password.check']);
    Route::post('password/store', [OrganizationAuthController::class, 'store'])->name('password.store')->middleware(['password.check']);
    Route::prefix('profile')->group(function () {
        Route::get('/', [OrganizationAuthController::class, 'profile'])->name('auth-organization.profile');
    });
    Route::middleware("auth:organization")->group(function(){
        Route::post('logout', [OrganizationAuthController::class, 'logout'])->name('logout');
        Route::resource('taxClearance', TaxClearanceController::class);
        Route::resource('renewed', RenewedController::class);
    });
   
});


Route::controller(MapApplyController::class)->group(function () {
    Route::get('mapApply/{mapApply}/map-form-info', 'mapFormInfo')->name('mapFormInfo');
    Route::get('mapApply/{mapApply}/update-status-organization/{noticeTypeEnum}', 'updateStatusOrganization')->name('updateStatusOrganization');
    Route::get('mapApply/{mapApply}/update-sent-admin-status', 'updateStatus')->name('updateStatus');
    Route::get('mapApply/{mapApply}/template-data/{noticeTypeEnum}', 'getTemplateData')->name('getTemplateData');
    Route::post('mapApply/{mapApply}/storeTemplateData/{noticeTypeEnum}', 'storeTemplateData')->name('storeTemplateData');
});
Route::get('mapApply/{mapApply}/form', [MapApplyController::class, 'formList'])->name('formList');
Route::get('mapApply/{mapApply}/form/{form}/formDetail', [MapApplyController::class, 'formDetail'])->name('formDetail');
Route::resource('mapApply', MapApplyController::class);
Route::get('mapApply/{mapApply}/formDataType/{formDataType}/print', [AttachDocumentController::class, 'printTemplate'])->name('printTemplate');
Route::get('appliedDocument/{appliedDocument}', [AttachDocumentController::class, 'documentDetail'])->name('documentDetail');
Route::get('formStore/{formStore}', [AttachDocumentController::class, 'formStoreDetail'])->name('formStoreDetail');
Route::get('formDataType/{formDataType}/formStore/{formStore}/print', [AttachDocumentController::class, 'formStorePrint'])->name('formStorePrint');
Route::resource('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/appliedDocument', AttachDocumentController::class);
Route::get('mapApply/{mapApply}/view/{form}/detail', [MapApplyController::class, 'viewDetail'])->name('organization.view-detail');



//organization notification

Route::get('notification', [OrganizationNotificationController::class, 'notification'])->name('notification');
Route::get('notification/{databaseNotification}', [OrganizationNotificationController::class, 'readNotification'])->name('notification.read');
Route::get('readAllNotification', [OrganizationNotificationController::class, 'readAllNotification'])->name('notification.readAllNotification');

//organization document

Route::get('mapApply/{mapApply}/attachment/organizationDocument', [AttachDocumentController::class, 'index'])->name('organizationDocument');
Route::post('mapApply/{mapApply}/attachment/storeOrganizationDocument', [AttachDocumentController::class, 'storeOrganizationDocument'])->name('storeOrganizationDocument');

Route::put('appliedDocument/{appliedDocument}/updateAppliedDocumentStatus', [AttachDocumentController::class, 'updateAppliedDocumentStatus'])->name('updateAppliedDocumentStatus');
Route::put('formStore/{formStore}/updateFormStoreStatus', [AttachDocumentController::class, 'updateFormStoreStatus'])->name('updateFormStoreStatus');
Route::put('paymentStore/{paymentStore}/updatePaymentStoreStatus', [AttachDocumentController::class, 'updatePaymentStoreStatus'])->name('updatePaymentStoreStatus');
