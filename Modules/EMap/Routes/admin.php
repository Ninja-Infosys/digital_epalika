<?php

use App\Http\Controllers\Admin\FileController;
use Illuminate\Support\Facades\Route;
use Modules\EMap\Http\Controllers\Admin\BuildingDocumentation\BuildingDocumentationController;
use Modules\EMap\Http\Controllers\Admin\BuildingDocumentation\LandReportController;
// use Modules\EMap\Entities\New\MapPassGroup;
use Modules\EMap\Http\Controllers\Admin\DashboardController;
use Modules\EMap\Http\Controllers\Admin\DocumentAttachController;
use Modules\EMap\Http\Controllers\Admin\EMapTemplateController;
use Modules\EMap\Http\Controllers\Admin\MapController;
use Modules\EMap\Http\Controllers\Admin\MapFeeController;
use Modules\EMap\Http\Controllers\Admin\MapRegistrationController;
use Modules\EMap\Http\Controllers\Admin\NecessaryDocumentController;
use Modules\EMap\Http\Controllers\Admin\RegistrationDocumentController;
use Modules\EMap\Http\Controllers\Admin\OrganizationArchiveController;
use Modules\EMap\Http\Controllers\Admin\OrganizationController;
use Modules\EMap\Http\Controllers\AdminStepController;
use Modules\EMap\Http\Controllers\BuildingDocumentationSettingController;
use Modules\EMap\Http\Controllers\CriteriaDetailSettingController;
use Modules\EMap\Http\Controllers\DynamicFormController;
use Modules\EMap\Http\Controllers\FormController;
use Modules\EMap\Http\Controllers\HouseOwnerArchiveController;
use Modules\EMap\Http\Controllers\LandUseAreaController;
use Modules\EMap\Http\Controllers\MapPassGroupController;
use Modules\EMap\Http\Controllers\MapSettingController;
use Modules\EMap\Http\Controllers\OldMapController;
use Modules\EMap\Http\Controllers\ReportController;
use Modules\EMap\Http\Controllers\StreetDetailController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/ajax', [DashboardController::class, 'ajaxData'])->name('dashboard.ajax');


Route::put('organization/{organization}/updateLoginStatus', [OrganizationController::class, 'updateLoginStatus'])->name('organization.update-login-status');
Route::resource('organization', OrganizationController::class);

//update status from admin
Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/appliedDocument/{appliedDocument}/updateAppliedDocumentStatus', [AdminStepController::class, 'updateAppliedDocumentStatus'])->name('mapApply.admin-step.updateAppliedDocumentStatus');
Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/appliedDocument/{appliedDocument}/updateCheckerDocumentStatus', [AdminStepController::class, 'updateCheckerDocumentStatus'])->name('mapApply.admin-step.updateCheckerDocumentStatus');
Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/appliedDocument/{appliedDocument}/uploadApprovedDocument', [AdminStepController::class, 'uploadApprovedDocument'])->name('mapApply.admin-step.uploadApprovedDocument');
Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/formStore/{formStore}/updateFormStoreStatus', [AdminStepController::class, 'updateFormStoreStatus'])->name('mapApply.admin-step.updateFormStoreStatus');
Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/formStore/{formStore}/uploadFormStoreApprovedDocument', [AdminStepController::class, 'uploadFormStoreApprovedDocument'])->name('mapApply.admin-step.uploadFormStoreApprovedDocument');
Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/paymentStore/{paymentStore}/updatePaymentStoreStatus', [AdminStepController::class, 'updatePaymentStoreStatus'])->name('mapApply.admin-step.updatePaymentStoreStatus');
Route::put('mapApply/{mapApply}/mapReject', [AdminStepController::class, 'rejectMap'])->name('mapApply.rejectMap');




Route::get('mapApply/{mapApply}/register', [MapController::class, 'register'])->name('mapApply.register-map');

Route::get('mapApply/{mapApply}/steps', [AdminStepController::class, 'formList'])->name('mapApply.admin-step.form-list');
Route::get('mapApply/{mapApply}/form/{form}/fill', [AdminStepController::class, 'fillDetail'])->name('mapApply.admin-step.fill-detail');
Route::get('mapApply/{mapApply}/form/{form}/detail', [AdminStepController::class, 'viewDetail'])->name('mapApply.admin-step.view-detail');
Route::get('mapApply/{mapApply}/form/{form}/documentDetail', [AdminStepController::class, 'viewDocumentDetail'])->name('mapApply.admin-step.view-document');
Route::get('mapApply/{mapApply}/form/{form}/formDetail', [AdminStepController::class, 'formDetail'])->name('mapApply.admin-step.formDetail');
Route::resource('mapApply/{mapApply}/mapRegistration', MapRegistrationController::class)->names('mapApply.mapRegistration');
Route::get('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/printTemplate', [DocumentAttachController::class, 'printTemplate'])->name('attach-document.print-template');
// Route::resource('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/appliedDocument', DocumentAttachController::class);
Route::post('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/document/appliedDocument', [DocumentAttachController::class, 'store'])->name('map-apply.appliedDocument.store');
Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/appliedDocument/{appliedDocument}', [DocumentAttachController::class, 'update'])->name('map-apply.appliedDocument.update');
Route::get('formStore/{formStore}', [DocumentAttachController::class, 'formStoreDetail'])->name('formStoreDetail');

Route::get('mapApply/{mapApply}/houseOwnerArchive/documentDetail', [HouseOwnerArchiveController::class, 'documentDetail'])->name('houseOwnerArchive.documentList');
Route::put('mapApply/{mapApply}/houseOwner/{houseOwner}/uploadDocument', [HouseOwnerArchiveController::class, 'uploadDocumentHouseOwner'])->name('houseOwner.uploadDocumentHouseOwner');
Route::put('mapApply/{mapApply}/houseOwnerArchive/{houseOwnerArchive}/uploadDocument', [HouseOwnerArchiveController::class, 'uploadDocument'])->name('houseOwnerArchive.uploadDocument');
Route::get('mapApply/{mapApply}/houseOwnerArchive/{houseOwnerArchive}/print', [HouseOwnerArchiveController::class, 'print'])->name('houseOwnerArchive.printMuchulka');
Route::get('mapApply/{mapApply}/houseOwner/{houseOwner}/print', [HouseOwnerArchiveController::class, 'printHouseOwner'])->name('houseOwnerArchive.printHouseOwner');
Route::resource('mapApply/{mapApply}/houseOwnerArchive', HouseOwnerArchiveController::class);
Route::post('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/appliedDocument', [AdminStepController::class, 'storeDocument'])->name('storeDocument');

//organization archive
Route::resource('mapApply/{mapApply}/organizationArchive', OrganizationArchiveController::class);

Route::put('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/{id}/appliedDocument', [AdminStepController::class, 'updateDocument'])->name('updateDocument');
//templete print
Route::get('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/print', [AdminStepController::class, 'printTemplate'])->name('printTemplate');
Route::get('formDataType/{formDataType}/formStore/{formStore}/print', [AdminStepController::class, 'formStorePrint'])->name('formStorePrint');
Route::get('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/editTemplate', [AdminStepController::class, 'editTemplate'])->name('editTemplate');
Route::post('mapApply/{mapApply}/form/{form}/formDataType/{formDataType}/storeFileTemplate', [AdminStepController::class, 'storeFileTemplate'])->name('storeFileTemplate');
Route::put('formStore/{formStore}/uploadDocument', [AdminStepController::class, 'uploadDocument'])->name('uploadFormStoreDocument');

Route::controller(MapController::class)->prefix('map')->as('map.')->group(function () {
    Route::prefix('mapApply/{mapApply}/notice')->as('map-apply.notice.')->group(function () {
        Route::prefix('upload')->as('upload.')->group(function () {
            Route::post('storeTemplateData/{applicationFormTypeEnum}/{noticeTypeEnum}', 'storeTemplateData')->name('store-template-data');
            Route::get('getTemplateData/{applicationFormTypeEnum}/{noticeTypeEnum}', 'getTemplateData')->name('get-template-data');
            Route::put('reject/{noticeTypeEnum}', 'reject')->name('reject');
        });
    });
    Route::put('mapApply/{mapApply}/updateDocumentStatus', 'updateDocumentStatus')->name('mapApply.updateDocumentStatus');
    Route::get('mapApply/{mapApply}/noticeList/{applicationFormTypeEnum}', 'noticeList')->name('mapApply.noticeList');
    Route::get('mapApply/{mapApply}/{applicationFormTypeEnum}/showFullDetail/{noticeTypeEnum}', 'show')->name('mapApply.show');
    Route::put('mapApply/{mapApply}/applyMapNotice/{applyMapNotice}/reject', 'rejectApplication')->name('mapApply.reject');
    Route::get('mapApply/{applicationFormTypeEnum}/{mapStatusEnum?}', 'index')->name('mapApply.index');

    Route::get('mapApply/{mapApply}/detail/{applicationFormTypeEnum}', 'mapDetail')->name('mapApply.mapDetail');
    Route::put('mapApply/{applicationFormTypeEnum}/{mapApply}', 'updateStatus')->name('mapApply.updateStatus');
});

Route::prefix('setting')->group(function () {
    Route::resource('mapSetting', MapSettingController::class)->only('index', 'store');
    Route::resource('mapFee', MapFeeController::class);
    Route::resource('necessaryDocument', NecessaryDocumentController::class);
    Route::resource('registrationDocument', RegistrationDocumentController::class);
    Route::post('eMapTemplate/getStaticTemplate', [EMapTemplateController::class, 'getStaticTemplate'])->name('template-emap.get-static-template');
    Route::get('eMapTemplate/enumList', [EMapTemplateController::class, 'enumList'])->name('eMapTemplate.enumList');
    Route::get('eMapTemplate/{eMapTemplate}/updateStatus', [EMapTemplateController::class, 'updateStatus'])->name('eMapTemplate.updateStatus');
    Route::resource('eMapTemplate', EMapTemplateController::class)->names('eMapTemplate');

    Route::get('mapPassGroup/{mapPassGroup}/toggleStatus', [MapPassGroupController::class, 'updateStatus'])->name('mapPassGroup.updateStatus');
    Route::resource('mapPassGroup', MapPassGroupController::class);
    Route::get('form/{form}/toggleStatus', [FormController::class, 'updateStatus'])->name('form.updateStatus');
    Route::resource('form', FormController::class);
    Route::get('dynamicForm/{dynamicForm}/toggleStatus', [DynamicFormController::class, 'updateStatus'])->name('dynamicForm.updateStatus');
    Route::get('dynamicForm/{dynamicForm}/template', [DynamicFormController::class, 'template'])->name('dynamicForm.template');
    Route::put('dynamicForm/{dynamicForm}/template', [DynamicFormController::class, 'templateStore'])->name('dynamicForm.template.store');
    Route::resource('dynamicForm', DynamicFormController::class);

    Route::resource('criteriaDetailSetting', CriteriaDetailSettingController::class);

    Route::resource('landUseArea', LandUseAreaController::class);
    Route::resource('streetDetail', StreetDetailController::class);
    Route::resource('buildingDocumentationSetting', BuildingDocumentationSettingController::class);
});

Route::prefix('files')->as('files.')->group(function () {
    Route::view('file', 'emap::admin.file.file')->name('file');
});



//oldMap
Route::resource('oldMap', OldMapController::class)->except(['update', 'store']);
Route::delete('oldMap/{oldMap}/oldMapDocument/{oldMapDocument}', [OldMapController::class, 'deleteOldMapDocument'])->name('oldMap.oldMapdDocument.destroy');

Route::controller(ReportController::class)->prefix('reports')->as('report.')->group(function () {
    Route::get('/', 'getRequiredData')->name('report');
    Route::post('report-data', 'report')->name('report-data');
});

Route::prefix('buildingDocumentation')->group(function () {
    Route::resource('buildingDocumentation', BuildingDocumentationController::class);
    Route::resource('buildingDocumentation/{buildingDocumentation}/landReport', LandReportController::class)->names('buildingDocumentation.landReport');

    Route::post('buildingDocumentation/{buildingDocumentation}/customData', [BuildingDocumentationController::class, 'customData'])
        ->name('store.customApplicationData');
    Route::get('buildingDocumentation/{buildingDocumentation}/printNotice', [BuildingDocumentationController::class, 'printNotice'])
        ->name('buildingDocumentation.printNotice');
    Route::put('buildingDocumentation/{buildingDocumentation}/printLandConfirmation', [BuildingDocumentationController::class, 'printLandConfirmation'])
        ->name('buildingDocumentation.printLandConfirmation');
    Route::put('buildingDocumentation/{buildingDocumentation}/printRecommendation', [BuildingDocumentationController::class, 'printRecommendation'])
        ->name('buildingDocumentation.printRecommendation');

    Route::put('buildingDocumentation/{buildingDocumentation}/sentToAdmin', [BuildingDocumentationController::class, 'sentToAdmin'])
        ->name('buildingDocumentation.sentToAdmin');
    Route::put('buildingDocumentation/{buildingDocumentation}/showToAdmin', [BuildingDocumentationController::class, 'showToAdmin'])
        ->name('buildingDocumentation.showToAdmin');
    Route::put('buildingDocumentation/{buildingDocumentation}/printCertificate', [BuildingDocumentationController::class, 'printCertificate'])
        ->name('buildingDocumentation.printCertificate');

    Route::get('buildingDocumentation/{buildingDocumentation}/printPermission', [BuildingDocumentationController::class, 'printPermission'])
        ->name('buildingDocumentation.printPermission');
    Route::get('buildingDocumentation/{buildingDocumentation}/printConfession', [BuildingDocumentationController::class, 'printConfession'])
        ->name('buildingDocumentation.printConfession');
    Route::post('buildingDocumentation/{buildingDocumentation}/landReportFile', [LandReportController::class, 'storeLandReport'])->name('buildingDocumentation.landReport.store');

});
